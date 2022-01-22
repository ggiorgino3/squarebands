<?php

namespace App\View\Composers;

use Illuminate\View\View;

class BaseComposer
{

    protected $pages;
    protected $socials;

    /**
     * Create a new composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->pages = array(
           "Concerts" => "concerts",
           "News" => "news",
           "Photo Gallery" => "photo_gallery",
           "Videos" => "videos",
           "Songs" => "songs",
           "Contacts" => "contacts",
           "Info" => "informations",
        );

        $this->socials = array(
           "facebook-square" => "https://test.com",
           "instagram-square" => "https://test.com",
           "spotify" => "https://test.com"
        );
    }

    /**
     * Bind data to the view.
     *
     * @param  \Illuminate\View\View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view
            ->with("socials", $this->socials)
            ->with("pages", $this->pages);
    }
}
