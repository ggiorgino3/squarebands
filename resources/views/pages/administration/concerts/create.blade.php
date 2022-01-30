@extends('layouts.base_admin')
@section('content')
    
    @include('includes.concerts.supplementary_fields', ['post_route' => $postRoute, 'element_title' => $elementTitle, 'albums' => $albums])

@endsection

