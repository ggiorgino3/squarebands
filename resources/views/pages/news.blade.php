@extends('layouts.base')
@section('content')
    <h1>Band's news</h1>
    <div>
        Here you can find all the news of the band!
    </div>
    @foreach ($newses as $news)
    <div class="col-4 ">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">
                    <a href="{{ route('news.single.show', $news->id) }}">{{ $news->title }}</a>
                </h1>
                <p class="card-text">{{mb_strimwidth( $news->description, 0, 100, "...") }}</p>
            </div>
            <footer class="blockquote-footer px-2">
                <span>
                    {{ date('l, jS F Y', strtotime($news->updated_at) ) }}
                </span>
                <h6 class="float-end">
                    <a href="{{ route('news.single.show', $news->id) }}">Read More...</a>
                </h6>
            </footer>
        </div>
    </div>
    @endforeach
    {{ $newses->links(); }}
@endsection
