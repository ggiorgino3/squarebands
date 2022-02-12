<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Concert;
use App\Models\News;
use App\Models\Song;
use DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.administration.dashboard')
            ->withLastThreeNews(News::where('status', 'publish')->orderBy('updated_at', 'desc')->take(3)->get())
            ->withNewsColumns(array(
                'title' => "Title",
                'created_at' => "Published Date"
            ))
            ->withLastThreeConcerts(Concert::where('datetime', '>', date("Y-m-d H:i:s"))->orderBy('datetime', 'asc')->take(3)->get())
            ->withConcertsColumns(array(
                'name' => "Name",
                'city_name' => "City Name",
                'datetime' => "DateTime"))
            ->withLastThreeAlbums(Album::orderBy('publish_date', 'desc')->take(3)->get())
            ->withAlbumsColumns(array(
                'title' => "Name",
                'genre' => "Genre",
                'publish_date' => "Publish Date"))
            ->withLastThreeSongs(Song::orderBy('created_at', 'desc')->take(3)->get())
            ->withSongsColumns(array(
                'name' => "Title",
                'genre' => "Genre",
                'created_at' => "Publish Date"));
    }
}
