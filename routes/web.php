<?php

use App\Http\Controllers\AdminController;
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
use App\Models\Concert;
use Illuminate\Support\Facades\Route;

//phpcs:disable
Route::view('/', "pages.homepage")->name("home");

Route::get(
    '/concerts',
    [ConcertController::class, "frontendIndex"]
)->name('concerts');

Route::get(
    '/concerts/{id}',
    [ConcertController::class, "show"]
)->name('concerts.single');

Route::get(
    '/news',
    [NewsController::class, "frontendIndex"]
)->name('pages.news');

Route::get(
    '/news/{id}',
    [NewsController::class, "show"]
)->name('news.single.show');

Route::view('/photo_gallery', 'pages.photos');

Route::get(
    '/photo_gallery',
    [PhotoController::class, "frontendIndex"]
)->name('photogallery');

Route::view('/videos', 'pages.videos');

Route::get(
    '/albums_songs',
    [SongController::class, "frontendIndex"]
)->name('songs');

Route::get(
    '/songs/{id}',
    [SongController::class, "show"]
)->name('song.show');

Route::get(
    '/contacts',
    [ContactController::class, "frontendIndex"]
)->name('contacts');

Route::get(
    '/video_gallery',
    [VideoController::class, "frontendIndex"]
)->name('videos');

Route::get(
    '/informations',
    [InformationController::class, "frontendIndex"]
)->name('informations');

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
                        'admins' => AdminController::class
                    ]
                );
            }
        );
    }
);
