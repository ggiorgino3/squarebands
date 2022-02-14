<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            [
                'pages.concerts',
                'includes.concerts.view_concert',
                'pages.homepage',
                'pages.news*',
                'pages.photos.frontendIndex',
                'pages.videos',
                'pages.songs*',
                'pages.informations',
                'pages.contacts*'
            ],
            "App\View\Composers\BaseComposer"
        );
        view()->composer(['photos.*', "concerts.*", "videos.*", "songs.*", 'pages.administration.*', ], "App\View\Composers\SidebarAdminComposer");
    }
}
