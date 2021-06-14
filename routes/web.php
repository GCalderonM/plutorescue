<?php

use App\Http\Controllers\AccessLogController;
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

/* Rutas para el frontend */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about-us');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('announce/{announceTitle}', [HomeController::class, 'viewAnnounce'])
    ->name('viewAnnounce');

/* Rutas para la dashboard */
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'dashboard'], function() {

        /* Rutas gestionadas por el rol Admin */
        Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard.index')
            ->middleware('role:Admin');

        /* Rutas para usuarios */
        Route::post('users/{user}/restore', [UserController::class, 'restore'])
            ->middleware('role:Admin')->name('users.restore');
        Route::put('users/{user}', [UserController::class, 'update'])
            ->middleware('role:Admin|Usuario')->name('users.update');
        Route::resource('users', UserController::class)->except(['update'])
            ->middleware('role:Admin');

        /* Rutas para anuncios */
        Route::post('announces/{announce}/restore', [AnnounceController::class, 'restore'])
            ->middleware('role:Admin')->name('announces.restore');
        Route::put('announces/{announce}', [AnnounceController::class, 'update'])
            ->middleware('role:Admin|Usuario')->name('announces.update');
        Route::resource('announces', AnnounceController::class)->except(['update'])
            ->middleware('role:Admin');

        /* Rutas para logs de acceso */
        Route::resource('accessLog', AccessLogController::class)
            ->except(['update', 'edit', 'create', 'store', 'destroy'])
            ->middleware('role:Admin');

        /* Rutas disponibles para los usuarios*/
        Route::resource('profile', ProfileController::class)
            ->middleware('role:Admin|Usuario');

        Route::group(['prefix' => 'my-announces'], function() {
            Route::get('create', [AnnounceController::class, 'createAnnounce'])
                ->name('my-announces.createAnnounce')
                ->middleware('role:Usuario');
            Route::get('edit/{announce}', [AnnounceController::class, 'edit'])
                ->name('my-announces.edit')
                ->middleware('role:Usuario');
            Route::post('store', [AnnounceController::class, 'store'])
                ->name('my-announces.store')
                ->middleware('role:Usuario');
            Route::get('/', [AnnounceController::class, 'myAnnounces'])
                ->name('my-announces.index')
                ->middleware('role:Usuario');
        });

        // Ruta necesaria para Filepond
        Route::post('upload', [UploadController::class, 'store'])
            ->middleware('role:Admin|Usuario');
    });
});
