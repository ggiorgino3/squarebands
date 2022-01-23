<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
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
        
        Route::get(
            '/dashboard',
            function () {
                return redirect('/');
            }
        );

        Route::middleware(['auth'])->group( // Authorized routes
            function () {
                Route::view('/dashboard', 'pages.administration.dashboard')->name("administration.homepage");
                Route::view('/informations', 'pages.administration.informations');
                Route::view('/gallery', 'pages.administration.gallery');
                Route::view('/videos', 'pages.administration.videos');
                Route::view('/songs', 'pages.administration.songs');
                Route::view('/concerts', 'pages.administration.concerts');
            }
        );
    }
);
