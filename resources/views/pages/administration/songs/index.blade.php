@extends('layouts.base_admin')
@section('content')
    @include('includes.songs.table', ['songs' => $songs])
@endsection


