<?php

namespace App\Http\Controllers;

use App\DataTables\AnnouncesDataTable;
use App\Http\Requests\AnnounceRequest;
use App\Models\Announce;
use App\Models\TemporaryFile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use JavaScript;

class AnnounceController extends Controller
{

    public function index(AnnouncesDataTable $announcesDataTable)
    {
        return $announcesDataTable->render('project.dashboard.announces.index');
    }

    public function myAnnounces()
    {
        if (is_null(auth()->user()->community) || is_null(auth()->user()->province)
            || is_null(auth()->user()->cp) || is_null(auth()->user()->tlfNumber)) {
            toastr()->error('Debes completar tu perfil con los datos requeridos!');
            return redirect()->route('profile.index');
        } else {
            $userAnnounces = Announce::where('user_id', auth()->user()->id)->paginate(3);
            return view('project.announce.index', compact('userAnnounces'));
        }
    }

    public function createAnnounce() {
        JavaScript::put([
            'announces_images' => 'undefined',
        ]);

        return view('project.announce.create-announce');
    }

    public function store(AnnounceRequest $request) {
        DB::beginTransaction();
        try {
            $newAnnounce = Announce::create($request->toArray());

            // Temp variables
            $temporaryFile2 = null;
            $temporaryFile3 = null;
            $temporaryFile4 = null;

            // Subimos la imagen requerida
            $temporaryFile1 = TemporaryFile::where('folder', $request->image1)->first();

            // Comprobamos que imagenes se han subido, y si es asi, creamos los TemporaryFile
            if ($request->image2) {
                $temporaryFile2 = TemporaryFile::where('folder', $request->image2)->first();
            }

            if ($request->image3) {
                $temporaryFile3 = TemporaryFile::where('folder', $request->image3)->first();
            }

            if ($request->image4) {
                $temporaryFile4 = TemporaryFile::where('folder', $request->image4)->first();
            }

            if ($temporaryFile1) {
                $newAnnounce->addMedia(storage_path('app/announces/tmp/' . $request->image1 . '/' . $temporaryFile1->filename))
                    ->toMediaCollection('announces_images');
                rmdir(storage_path('app/announces/tmp/' . $request->image1));
                $temporaryFile1->delete();
            }

            if (!is_null($temporaryFile2)) {
                $newAnnounce->addMedia(storage_path('app/announces/tmp/' . $request->image2 . '/' . $temporaryFile2->filename))
                    ->toMediaCollection('announces_images');
                rmdir(storage_path('app/announces/tmp/' . $request->image2));
                $temporaryFile2->delete();
            }

            if (!is_null($temporaryFile3)) {
                $newAnnounce->addMedia(storage_path('app/announces/tmp/' . $request->image3 . '/' . $temporaryFile3->filename))
                    ->toMediaCollection('announces_images');
                rmdir(storage_path('app/announces/tmp/' . $request->image3));
                $temporaryFile3->delete();
            }

            if (!is_null($temporaryFile4)) {
                $newAnnounce->addMedia(storage_path('app/announces/tmp/' . $request->image4 . '/' . $temporaryFile4->filename))
                    ->toMediaCollection('announces_images');
                rmdir(storage_path('app/announces/tmp/' . $request->image4));
                $temporaryFile4->delete();
            }

            DB::commit();
            toastr()->success(__('global.create-success'));
            return redirect()->route('my-announces.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error(__('global.create-error'));
            return redirect()->route('my-announces.index');
        }
    }

    public function edit(Announce $announce): View
    {
        if ($announce->getMedia('announces_images')->count() > 0) {
            $allImages = $announce->getMedia('announces_images')->all();
            $imagesURL[] = [];

            for ($i = 0; $i < count($allImages); $i++) {
                $imagesURL[$i] = $allImages[$i]->getUrl();
            }

            JavaScript::put([
                'announce' => $announce,
                'announces_images' => $imagesURL,
            ]);
        }else {
            JavaScript::put([
                'announce' => $announce,
                'announces_images' => 'undefined',
            ]);
        }

        return view('project.dashboard.announces.edit', compact('announce'));
    }

    public function update(AnnounceRequest $request, Announce $announce): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $announce->fill($request->validated())->update();
            $announce->updated_at = now();

            // Temp variables
            $temporaryFile2 = null;
            $temporaryFile3 = null;
            $temporaryFile4 = null;

            // Subimos la imagen requerida
            $temporaryFile1 = TemporaryFile::where('folder', $request->image1)->first();

            // Comprobamos que imagenes se han subido, y si es asi, creamos los TemporaryFile
            if ($request->image2) {
                $temporaryFile2 = TemporaryFile::where('folder', $request->image2)->first();
            }

            if ($request->image3) {
                $temporaryFile3 = TemporaryFile::where('folder', $request->image3)->first();
            }

            if ($request->image4) {
                $temporaryFile4 = TemporaryFile::where('folder', $request->image4)->first();
            }

            if ($temporaryFile1) {
                $announce->addMedia(storage_path('app/announces/tmp/' . $request->image1 . '/' . $temporaryFile1->filename))
                    ->toMediaCollection('announces_images');
                rmdir(storage_path('app/announces/tmp/' . $request->image1));
                $temporaryFile1->delete();
            }

            if (!is_null($temporaryFile2)) {
                $announce->addMedia(storage_path('app/announces/tmp/' . $request->image2 . '/' . $temporaryFile2->filename))
                    ->toMediaCollection('announces_images');
                rmdir(storage_path('app/announces/tmp/' . $request->image2));
                $temporaryFile2->delete();
            }

            if (!is_null($temporaryFile3)) {
                $announce->addMedia(storage_path('app/announces/tmp/' . $request->image3 . '/' . $temporaryFile3->filename))
                    ->toMediaCollection('announces_images');
                rmdir(storage_path('app/announces/tmp/' . $request->image3));
                $temporaryFile3->delete();
            }

            if (!is_null($temporaryFile4)) {
                $announce->addMedia(storage_path('app/announces/tmp/' . $request->image4 . '/' . $temporaryFile4->filename))
                    ->toMediaCollection('announces_images');
                rmdir(storage_path('app/announces/tmp/' . $request->image4));
                $temporaryFile4->delete();
            }

            if ($request->announce_image1Remove === '0') {
                $announce->getMedia('announces_images')
                    ->get(0)->delete();
            }

            if ($request->announce_image2Remove === '0') {
                $announce->getMedia('announces_images')
                    ->get(1)->delete();
            }

            if ($request->announce_image3Remove === '0') {
                $announce->getMedia('announces_images')
                    ->get(2)->delete();
            }

            if ($request->announce_image4Remove === '0') {
                $announce->getMedia('announces_images')
                    ->get(3)->delete();
            }

            DB::commit();
            toastr()->success(__('global.update-success'));
            if (Auth::user()->hasRole('Admin')) {
                return redirect()->route('announces.index');
            } else {
                return redirect()->route('my-announces.index');
            }
        }catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error(__('global.update-error'));
            if (Auth::user()->hasRole('Admin')) {
                return redirect()->route('announces.index');
            } else {
                return redirect()->route('my-announces.index');
            }
        }
    }

    public function destroy(Announce $announce): RedirectResponse
    {
        DB::beginTransaction();
        try {
            if ($announce->deleted_at != null) {
                $announce->forceDelete();
            }

            $announce->delete();
            DB::commit();
            toastr()->success(__('global.delete-success'));
            return redirect()->route('announces.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error(__('global.delete-error'));
            return redirect()->route('announces.index');
        }
    }

    public function restore($announceId)
    {
        DB::beginTransaction();
        try {
            Announce::onlyTrashed()->findOrFail($announceId)->restore();
            toastr()->success(__('global.restore-success'));
            DB::commit();
            return redirect()->route('announces.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            toastr()->error(__('global.restore-error'));
            return redirect()->route('announces.index');
        }
    }
}
