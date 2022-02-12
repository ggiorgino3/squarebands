<?php

namespace App\View\Composers;

use App\Models\Options;
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
           "facebook-square" => Options::where('meta_key', 'fb_link')->value('meta_value'),
           "instagram-square" => Options::where('meta_key', 'ig_link')->value('meta_value'),
           "spotify" => Options::where('meta_key', 'spotify_url')->value('meta_value'),
           "youtube-square" => Options::where('meta_key', 'yt_channel')->value('meta_value')
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
