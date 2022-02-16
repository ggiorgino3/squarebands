@extends('layouts.base_admin')
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endpush
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
            @include("includes.dashboard.title", ['title' => "Last 3 published news", 'btn_title' => "Create News", 'route'
            => route('news.create') ] )
            @include("includes.dashboard.table", ['elements' => $lastThreeNews, 'columns' => $newsColumns, 'route' => 'news'
            ] )
        </div>
        <div class="col-6">
            @include("includes.dashboard.title", ['title' => "Next 3 upcoming concerts", 'btn_title' => "Create Concert",
            'route' => route('concerts.create') ] )
            @include("includes.dashboard.table", ['elements' => $lastThreeConcerts, 'columns' => $concertsColumns, 'route'
            => 'concerts' ])
        </div>
    </div>
    <div class="row my-2">
        <div class="col-6">
            @include("includes.dashboard.title", ['title' => "Last 3 uploaded albums", 'btn_title' => "Create Album",
            'route' => route('albums.create') ] )

            @include("includes.dashboard.table", ['elements' => $lastThreeAlbums, 'columns' => $albumsColumns, 'route' =>
            'albums' ])
        </div>
        <div class="col-6">
            @include("includes.dashboard.title", ['title' => "Last 3 uploaded songs", 'btn_title' => "Upload new Song",
            'route' => route('songs.create') ] )
            @include("includes.dashboard.table", ['elements' => $lastThreeSongs, 'columns' => $songsColumns, 'route' =>
            'songs' ])
        </div>
    </div>
@endsection
