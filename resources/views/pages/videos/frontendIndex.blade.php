@extends('layouts.base')
@section('content')
    <h1> Video Gallery </h1>
    <div class="row">
        @foreach ($videos as $video)
            <div class="col-6 my-4 d-flex flex-column justify-content-center">
                <div class="hstack">
                    <div class="vr me-2 my-1" style="height: 50px; width: 3px"></div>
                    <h5 class="mb-0">{{$video->name}}</h5>
                </div>
                @if ($video->type === 'youtube')
                    <iframe width="420" height="315" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                @elseif ($video->type === 'vimeo')
                    <iframe src="https://player.vimeo.com/video/76979871?background=1" width="420" height="315"
                        frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                @else
                    <video class="w-100 p-2" width="420" height="315" controls>
                        <source src="{{ $video->uri }}" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                @endif
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-center text-center">
        {!! $videos->links(); !!}
    </div>
@endsection
