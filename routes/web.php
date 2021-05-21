<?php

use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Ruta principal Landing Page */
Route::get('/', [HomeController::class, 'index'])->name('home');

/* Rutas para la dashboard */
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'dashboard'], function() {

        /* Rutas gestionadas por el rol Admin */
        Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard.index')
            ->middleware('role:Admin');
        Route::post('users/{user}/restore', [UserController::class, 'restore'])
            ->middleware('role:Admin')->name('users.restore');
        Route::put('users/{user}', [UserController::class, 'update'])
            ->middleware('role:Admin|Usuario')->name('users.update');
        Route::resource('users', UserController::class)->except(['update'])->middleware('role:Admin');
        Route::get('announces', [HomeController::class, 'announces'])->name('dashboard.announces')
            ->middleware('role:Admin');

        /* Rutas disponibles para los usuarios*/
        Route::resource('profile', ProfileController::class)
            ->middleware('role:Admin|Usuario');
        Route::resource('announce', AnnounceController::class)
            ->middleware('role:Usuario');
        Route::post('upload', [UploadController::class, 'store'])
            ->middleware('role:Admin|Usuario');
    });
});
