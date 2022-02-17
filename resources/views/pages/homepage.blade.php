    @extends('layouts.base')
@section('content')
    <div class="container">
        <div class="row my-2">

            <div class="col-3 px-2 ">
                <div class="mx-2 text-center h-100 bg-dark opacity-90">
                    <h1 class="pt-2">Last albums</h1>
                    <hr/>
                    @foreach ($albums as $album)
                        @include('includes.albums.view_homepage')
                    @endforeach
                </div>
            </div>
            <div class="col-6 px-2 ">
                <div class="text-center bg-dark  h-100 opacity-90 mx-2">
                    <h1 class="pt-2">News</h1>
                    <hr/>

                    @include('includes.news')
                </div>
            </div>
            <div class="col-3 px-2 ">
                <div class="col-12  text-center  bg-dark opacity-90">
                    <h1 class="pt-2">Next events</h1>
                    <hr/>
                    @foreach ($nextEvents as $concert)
                        @include('includes.concerts.view_homepage')
                    @endforeach

                </div>
                <div class="col-12 text-center bg-dark opacity-90">
                    <h1 class="pt-2">Latest videos</h1>
                    <hr/>
                    @foreach ($latestVideos as $video)
                        @include('includes.videos.view_homepage')
                    @endforeach


                </div>
            </div>
        </div>
    </div>
@endsection
