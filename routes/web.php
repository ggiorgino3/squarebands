<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

//phpcs:disable
Route::view('/', "pages.homepage");
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
        Route::view(
            '/login',
            'pages.administration.login',
        )->name('administration.login');
        
        Route::middleware(['auth'])->group( // Authorized routes
            function () {
                Route::view('/', 'pages.administration.dashboard');
                Route::view('/informations', 'pages.administration.informations');
                Route::view('/gallery', 'pages.administration.gallery');
                Route::view('/videos', 'pages.administration.videos');
                Route::view('/songs', 'pages.administration.songs');
                Route::view('/concerts', 'pages.administration.concerts');
            }
        );
    }
);
