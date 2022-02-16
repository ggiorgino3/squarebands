@extends('layouts.base')
@push('scripts')
    <script src="{{ mix('js/amplitude.js') }}"></script>
    <script>
        var playlists = {
            <?php foreach ($albums as $album): ?>
            <?php $album_title_dashed = str_replace([' ', '&'], ['-', 'and'], strtolower($album->title)); ?> "{{ $album_title_dashed }}": {
                songs: [
                    <?php foreach ($album->songs as $song): ?> {
                        "name": "{{ $song->name }}",
                        "artist": "Dream Theater",
                        "album": "{{ $album->title }}",
                        "url": "{{ $song->uri }}",
                        "cover_art_url": "{{asset('assets/album/album_bg.jpeg')}}",
                    },
                    <?php endforeach; ?>
                ],
            },
            <?php endforeach; ?>
        };
        var firstKey = Object.keys(playlists)[0];

        var songs = [
        ];
        songs.push(playlists[firstKey].songs[0]);
        document.addEventListener("DOMContentLoaded", function(event) {
            Amplitude.init({
                songs: songs,
                playlists: playlists
            });
        });
    </script>
@endpush
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/album.css') }}">
@endpush
@section('content')
    @foreach ($albums as $counter_album => $album)
        <?php $album_title_dashed = str_replace([' ', '&'], ['-', 'and'], strtolower($album->title)); ?> 
        @include('includes.songs.album_card', ['album_title_dashed' => $album_title_dashed])
    @endforeach
@endsection
