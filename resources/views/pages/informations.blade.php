@extends('layouts.base')

@section('content')
    <h1>Band Informations page</h1>
    @foreach ($informations as $information)
        <h3>{{ $information->title }}</h3>
        <p>{{ $information->meta_value }}</p>
    @endforeach
@endsection
