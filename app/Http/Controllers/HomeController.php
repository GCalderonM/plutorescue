<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Models\Announce;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Display the dashboard
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function dashboard() {

        $users = User::all()->count();
        $announces = Announce::all()->count();

        return \view('project.dashboard.index', compact('users', 'announces'));
    }

    /**
     * Display all existing users on a DataTable
     * @param UsersDataTable $usersDataTable
     * @return mixed
     */
    public function users(UsersDataTable $usersDataTable) {

        return $usersDataTable->render('project.dashboard.users.index');
    }

    /**
     * Display all existing announces
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|View
     */
    public function announces() {
        $announces = Announce::all();

        return \view('project.dashboard.announces.index', compact('announces'));
    }
}
