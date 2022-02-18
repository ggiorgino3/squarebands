<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Concert;
use App\Models\News;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $news = News::where('status', 'publish')->orderBy('updated_at', 'DESC')->take(5)->get();
        $albums = Album::orderBy('publish_date', 'DESC')->take(3)->get();
        $nextEvents = Concert::where('datetime', '>', date("Y-m-d H:i:s"))->orderBy('datetime', 'asc')->take(3)->get();
        $latestVideos = Video::orderBy('updated_at', 'DESC')->take(2)->get();
        return view("pages.homepage")
                ->withNews($news)
                ->withNextEvents($nextEvents)
                ->withLatestVideos($latestVideos)
                ->withAlbums($albums);
    }

}
