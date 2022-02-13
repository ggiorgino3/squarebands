@extends('layouts.base')

@section('content')
    <h1>
        {{ $news->title }}
    </h1>

    <div>
        {{ $news->description }}
    </div>

    <footer>
        {{ $news->updated_at }}
    </footer>
@endsection
