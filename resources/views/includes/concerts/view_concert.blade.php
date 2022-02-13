@extends('layouts.base')
@section('content')
    <h1>{{ $concert->name}}</h1>

    <div class="description">
        {{ $concert->description}}
    </div>
    <h3>
        {{ $concert->place_name}}, <br/>
        {{ $concert->city_name}}
    </h3>

@endsection
