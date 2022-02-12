@extends('layouts.base')

@push('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endpush

@section('content')
    <div class="row">
        <h1>Home Page</h1>
        <div class="container">
            <p>Questa è la home Page</p>
            @include('includes.news')
        </div>
    </div>
@endsection
