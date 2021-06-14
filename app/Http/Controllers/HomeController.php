<?php

namespace App\Http\Controllers;

use App\DataTables\AnnouncesDataTable;
use App\DataTables\UsersDataTable;
use App\Http\Requests\SearchRequest;
use App\Models\Announce;
use App\Models\Community;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Mixed_;

class HomeController extends Controller
{

    public function index() : \Illuminate\View\View
    {
        return view('home');
    }

    public function dashboard() : \Illuminate\View\View
    {
        $users = User::all()->count();
        $announces = Announce::all()->count();

        return view('project.dashboard.index', compact('users', 'announces'));
    }

    public function about() : \Illuminate\View\View
    {
        return view('site.about-us');
    }

    public function search(SearchRequest $request)
    {
        $request->offsetUnset('_token');

        if (Community::where('name', $request->localization)->count() > 0 ||
            Province::where('name', $request->localization)->count() > 0) {
            if (isset($request->gender)) {
                if (Community::where('name', $request->localization)->count() > 0) {
                    $community = Community::where('name', $request->localization)->first();
                    $users = User::where('community_id', $community->id)->get('id');
                } else {
                    $province = Province::where('name', $request->localization)->first();
                    $users = User::where('province_id', $province->id)->get('id');
                }
                $announces = Announce::whereIn('user_id', $users)
                    ->where('gender', $request->gender)
                    ->paginate(8);
            } else {
                if (Community::where('name', $request->localization)->count() > 0) {
                    $community = Community::where('name', $request->localization)->first();
                    $users = User::where('community_id', $community->id)->get('id');
                } else {
                    $province = Province::where('name', $request->localization)->first();
                    $users = User::where('province_id', $province->id)->get('id');
                }
                $announces = Announce::whereIn('user_id', $users)->paginate(8);
            }
            return view('site.search', compact('announces'));
        } else {
            return view('site.search');
        }
    }

    public function viewAnnounce($announceTitle)
    {
        $title = Str::title(str_replace('-', ' ', $announceTitle));
        $announce = Announce::where('title', $title)->first();

        return view('site.announce-details', compact('announce'));
    }
}
