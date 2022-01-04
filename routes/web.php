<?php
use Illuminate\Support\Facades\Route;

//phpcs:disable
Route::get('/', function () {
        return view('homepage');
    }
);
//phpcs:enable

Route::prefix('administration')->group(
    function () {
        Route::view(
            '/login',
            'administration.login',
        )->name('administration.login');
        
        //Auth::routes();

        Route::middleware(['auth'])->group( // Authorized routes
            function () {
                Route::view('/', 'adminDashboard');
                Route::view('/informations', 'informations');
                Route::view('/gallery', 'gallery');
                Route::view('/songs', 'songs');
                Route::view('/concerts', 'concerts');
            }
        );
    }
);
