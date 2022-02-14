@extends('layouts.base')
@section('content')
    @foreach ($albums as $album)
        @include('includes.songs.album_card')
    @endforeach
@endsection
