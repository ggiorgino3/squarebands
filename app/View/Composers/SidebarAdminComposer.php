<?php

namespace App\View\Composers;

use Illuminate\View\View;

class SidebarAdminComposer
{

    protected $macromenus;
    protected $base_url = "/administration";

    /**
     * Create a new composer.
     *
     * @return void
     */
    public function __construct()
    {
        $this->macromenus = array(
            "MAIN MENU" => array(
                array(
                     "url" => "$this->base_url",
                     "icon" => 'gauge',
                     "title" => 'Dashboard',
                 ),
             ),
           "CONCERTS" => array(
               array(
                    "url" => "$this->base_url/concerts",
                    "icon" => 'guitar',
                    "title" => 'All concerts',
                ),
                array(
                    "url" => "$this->base_url/add_concert",
                    "icon" => 'plus',
                    "title" => 'Add a concert',
                ),
            ),
            "SONGS" => array(
                array(
                     "url" => "$this->base_url/songs",
                     "icon" => 'music',
                     "title" => 'All songs',
                 ),
                 array(
                     "url" => "$this->base_url/add_song",
                     "icon" => 'plus',
                     "title" => 'Add a song',
                 ),
            ),
            "PHOTOS" => array(
                array(
                     "url" => "$this->base_url/photos",
                     "icon" => 'image',
                     "title" => 'All photos',
                 ),
                 array(
                     "url" => "$this->base_url/add_photo",
                     "icon" => 'plus',
                     "title" => 'Add a photo',
                 ),
            ),
            "VIDEOS" => array(
                array(
                     "url" => "$this->base_url/videos",
                     "icon" => 'video',
                     "title" => 'All videos',
                 ),
                 array(
                     "url" => "$this->base_url/add_video",
                     "icon" => 'plus',
                     "title" => 'Add a video',
                 ),
            ),
            "ALBUMS" => array(
                array(
                     "url" => "$this->base_url/albums",
                     "icon" => 'record-vinyl',
                     "title" => 'All albums',
                 ),
                 array(
                     "url" => "$this->base_url/add_album",
                     "icon" => 'plus',
                     "title" => 'Add an album',
                 ),
            ),
            "NEWS" => array(
                array(
                     "url" => "$this->base_url/news",
                     "icon" => 'rss',
                     "title" => 'All news',
                 ),
                 array(
                     "url" => "$this->base_url/add_news",
                     "icon" => 'plus',
                     "title" => 'Add a news',
                 ),
            ),
            "CONTACTS" => array(
                array(
                     "url" => "$this->base_url/contacts",
                     "icon" => 'address-book',
                     "title" => 'All contacts',
                 ),
                 array(
                     "url" => "$this->base_url/add_contact",
                     "icon" => 'plus',
                     "title" => 'Add a contact',
                 ),
            ),
            "INFO" => array(
                array(
                     "url" => "$this->base_url/informations",
                     "icon" => 'circle-info',
                     "title" => 'All infos',
                 ),
                 array(
                     "url" => "$this->base_url/add_info",
                     "icon" => 'plus',
                     "title" => 'Add an information',
                 ),
            ),
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
            ->with("menus", $this->macromenus);
    }
}
