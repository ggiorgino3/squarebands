@extends('layouts.base_admin')
@section('content')
    @include('includes.concerts.table', ['concerts' => $concerts])
@endsection


