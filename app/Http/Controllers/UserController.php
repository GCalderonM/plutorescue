<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests\UpdateUserRequest;
use App\Models\TemporaryFile;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use JavaScript;

class UserController extends Controller
{

    public function index(UsersDataTable $usersDataTable)
    {
        return $usersDataTable->render('project.dashboard.users.index');
    }

    public function edit(User $user): View
    {

        if ($user->getMedia('avatar')->first()) {
            JavaScript::put([
                'user' => $user,
                'user_img' => $user->getMedia('avatar')->first()->getUrl(),
            ]);
        }else {
            JavaScript::put([
                'user' => $user,
                'user_img' => 'undefined',
            ]);
        }

        return view('project.dashboard.users.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        DB::beginTransaction();
        try {
            // Actualizamos el usuario con los nuevos datos
            $user->fill($request->validated())->update();

            // Obtenemos el fichero temporal que se ha creado al subir la imagen
            $temporaryFile = TemporaryFile::where('folder', $request->avatar)->first();

            // Si existe, le añadimos esa imagen al usuario que se está actualizando y borramos,
            // tanto el directorio del avatar, como el objeto temporal
            if ($temporaryFile) {
                $user->addMedia(storage_path('app/avatars/tmp/' . $request->avatar . '/' . $temporaryFile->filename))
                    ->toMediaCollection('avatar');
                rmdir(storage_path('app/avatars/tmp/' . $request->avatar));
                $temporaryFile->delete();
            }
            DB::commit();
            // Mostramos un mensaje de que se ha actualizado correctamente
            // y redirijimos dependiendo que rol tenga el usuario
            toastr()->success(__('global.update-success'));
            if ($user->hasRole('Admin')) {
                return redirect()->route('users.index');
            } else {
                return redirect()->route('profile.index');
            }
        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error(__('global.update-error'));
            if ($user->hasRole('Admin')) {
                return redirect()->route('users.index');
            } else {
                return redirect()->route('profile.index');
            }
        }
    }

    public function destroy(User $user): RedirectResponse
    {
        DB::beginTransaction();
        try {
            if ($user->deleted_at != null) { // El usuario ya está borrado, lo borramos completamente
                $user->forceDelete();
            }

            $user->delete();
            DB::commit();
            toastr()->success(__('global.delete-success'));
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error(__('global.delete-error'));
            return redirect()->route('users.index');
        }
    }

    public function restore($userId) : RedirectResponse
    {
        DB::beginTransaction();
        try {
            User::onlyTrashed()->findOrFail($userId)->restore();
            DB::commit();
            toastr()->success(__('global.restore-success'));
            return redirect()->route('users.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error(__('global.restore-error'));
            return redirect()->route('users.index');
        }
    }
}
