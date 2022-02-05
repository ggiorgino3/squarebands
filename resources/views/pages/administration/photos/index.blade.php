@extends('layouts.base_admin')
@section('content')
    @include('includes.photos.gallery', ['photos' => Photo::all()])
@endsection


