<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\SongController;
use App\Http\Controllers\VideoController;
use App\Models\Album;
use Illuminate\Support\Facades\Route;

//phpcs:disable
Route::view('/', "pages.homepage")->name("home");
Route::view('/concerts', 'pages.concerts');
Route::view('/news', 'pages.news');
Route::view('/photo_gallery', 'pages.photos');
Route::view('/videos', 'pages.videos');
Route::view('/songs', 'pages.songs');
Route::view('/contacts', 'pages.contacts');
Route::view('/informations', 'pages.informations');
//phpcs:enable

Route::prefix('administration')->group(
    function () {
        
        Route::get(
            '/login',
            [LoginController::class, "login"]
        )->name('administration.login');

        Route::post(
            '/login',
            [LoginController::class, "attempt"]
        )->name('administration.loginPost');
        
        // Redirects

        /*       Route::get(
                    '/dashboard',
                    function () {
                        return redirect('/');
                    }
                );
        */
        Route::get(
            '/',
            function () {
                return redirect('/administration/dashboard');
            }
        );
        
        // Authorized routes
        
        Route::middleware(['auth'])->group(
            function () {
               
                Route::get(
                    '/dashboard',
                    [DashboardController::class, "index"]
                )->name("administration.homepage");

                Route::resources(
                    [
                        'photos' => PhotoController::class,
                        'videos' => VideoController::class,
                        'songs' => SongController::class,
                        'news' => NewsController::class,
                        'concerts' => ConcertController::class,
                        'contacts' => ContactController::class,
                        'albums' => AlbumController::class,
                        'informations' => InformationController::class,
                    ]
                );
            }
        );
    }
);
