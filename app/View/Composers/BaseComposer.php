<?php

namespace App\View\Composers;

use App\Models\Option;
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
           "Concerts" => route('concerts'),
           "News" => route('pages.news'),
           "Photo Gallery" => route('photogallery'),
           "Video Gallery" => route('videos'),
           "Songs" => route('songs'),
           "Contacts" => route('contacts'),
           "Info" => route('informations'),
        );

        $this->socials = array(
           "facebook-square" => Option::where('meta_key', 'fb_link')->value('meta_value'),
           "instagram-square" => Option::where('meta_key', 'ig_link')->value('meta_value'),
           "spotify" => Option::where('meta_key', 'spotify_url')->value('meta_value'),
           "youtube-square" => Option::where('meta_key', 'yt_channel')->value('meta_value')
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
