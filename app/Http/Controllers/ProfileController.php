<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\TemporaryFile;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use JavaScript;

class ProfileController extends Controller
{

    public function index() : View
    {
        $user = Auth::user();

        if ($user->getMedia('avatar')->first() != null) {
            JavaScript::put([
                'user' => $user,
                'user_img' => $user->getMedia('avatar')->first()->getUrl(),
            ]);
        } else {
            JavaScript::put([
                'user' => $user,
                'user_img' => 'undefined'
            ]);
        }

        return view('project.dashboard.profile', compact('user'));
    }

    public function destroy(User $user)
    {
        return null;
    }
}
