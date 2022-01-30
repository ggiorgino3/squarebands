@extends('layouts.base_admin')
@section('content')
    
    @include('includes.songs.supplementary_fields', ['post_route' => $postRoute, 'element_title' => $elementTitle])

@endsection

