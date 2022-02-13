@extends('layouts.base')
@section('content')
    <div class="row">
        <h1>Home Page</h1>
        <div class="container">
            <p>Questa è la home Page</p>
            @include('includes.news')
        </div>
    </div>
@endsection
