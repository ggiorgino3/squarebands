@extends('layouts.base_admin')
@section('content')
    @include('includes.photos.supplementary_fields', [
        'post_route' => $postRoute,
        'element' => $element,
        'concerts' => $concerts,
        'newses' => $news
        ])
@endsection

