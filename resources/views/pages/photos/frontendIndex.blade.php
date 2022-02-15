@extends('layouts.base')
@push("styles")
    <link rel="stylesheet" href="{{ asset('css/frontend_gallery.css') }}">
@endpush
@section('content')
    <h1> Photo Gallery </h1>
    <div class="row">
        @foreach ($photos as $photo)    
            <div class="col-lg-4 mb-4 mb-lg-0">
                <img loading="lazy" src="{{ $photo->uri }}" class="w-100 image shadow-1-strong rounded mb-4"
                alt="{{ $photo->name }}" />
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-center my-3">
        {!! $photos->links() !!}
    </div>
    
@endsection
