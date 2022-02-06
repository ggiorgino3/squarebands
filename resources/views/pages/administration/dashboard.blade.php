@extends('layouts.base_admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <h1>Admin Dashboard</h1>
        </div>

        <div class="col-md-12">
            <hr>
        </div>
    </div> <!-- end of .row -->
    <div class="row">
        <div class="col-6">
            <h1>Last 3 published news</h1>
            @include("includes.dashboard.table", ['elements' => $lastThreeNews, 'columns' => $newsColumns, 'route' => 'news' ] )
        </div>
        <div class="col-6">
            <h1>Next 3 upcoming concerts</h1>
             @include("includes.dashboard.table", ['elements' => $lastThreeConcerts, 'columns' => $concertsColumns, 'route' => 'concerts' ])
        </div>
    </div>
    <div class="row">
        <div class="col-6">
            <h1>Last 3 uploaded albums</h1>
             @include("includes.dashboard.table", ['elements' => $lastThreeAlbums, 'columns' => $albumsColumns, 'route' => 'albums' ])
        </div>
        <div class="col-6">
            <h1>Last 3 uploaded songs</h1>
             @include("includes.dashboard.table", ['elements' => $lastThreeSongs, 'columns' => $songsColumns, 'route' => 'songs' ])
        </div>
    </div>
@endsection