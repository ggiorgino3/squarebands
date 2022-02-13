@extends('layouts.base')
@push("styles")
    <link rel="stylesheet" href="{{ asset('css/concerts_frontend.css') }}">
@endpush
@section('content')
    <h1>Band's Concerts</h1>
    <div>
        Here you can find all the concerts that will going to do!
    </div>
    @foreach ($concerts as $concert)
        @include('includes.concerts.concert_card')
    @endforeach
@endsection
