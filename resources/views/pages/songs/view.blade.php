@extends('layouts.base')

@section('content')
    <h1>
        {{ $song->name }}
    </h1>

    <div>
        {{ $song->description }}
    </div>

@endsection
