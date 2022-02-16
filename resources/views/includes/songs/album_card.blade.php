<div class="card bg-dark hstack p-2 my-2">
    <div class="px-2 me-3 text-center" style="max-width: 200px">
        <img width="100" src="{{ $album->img ?? asset('assets/album/vynil.png') }}" />
        <h2 class="my-2">{{ $album->title }}</h2>
        <div class="text-center genre">
            <div class="badge rounded-pill bg-secondary">
                <img src="{{ asset('assets/album/hand.png') }}" alt="hand" />
                {{ $album->genre }}
                <img src="{{ asset('assets/album/hand.png') }}" alt="hand" />
            </div>
        </div>
    </div>
    <span class="vr"></span>
    <div class="px-4 w-25">
        {{-- <ol> --}}
        <div id="black-player">
            <div id="black-player-playlist">
                @foreach ($album->songs as $id => $song)
                    <div class="black-player-song amplitude-song-container amplitude-play-pause"
                        data-amplitude-song-index="{{ $id }}"
                        data-amplitude-playlist="{{ $album_title_dashed }}">
                         <img src="{{asset('assets/album/album_bg.jpeg') }}">
                        <div class="song-meta-container">
                            <span class="individual-song-name">{{ $song->name }}</span>
                            <span class="individual-song-artist">Dream Theater</span>
                        </div>
                    </div>

                    {{-- <div class="row">
                    <li>
                        <div class="w-100">
                            <a href=" {{ route('song.show', $song->id) }}">
                                {{ $song->name }}
                            </a>
                            @if ($song->duration)
                                <span class="float-end">
                                    <div class="badge rounded-pill bg-info">
                                        {{ $song->duration }}
                                    </div>
                                </span>
                            @endif
                        </div>
                    </li>
                </div> --}}
                @endforeach
            </div>
        </div>
        {{-- </ol> --}}
    </div>
    <div class="w-75">
        <div id="black-player-controls">
            <img data-amplitude-song-info="cover_art_url" data-amplitude-playlist="{{ $album_title_dashed }}"
                class="playlist-album-art" src="{{asset('assets/album/album_bg.jpeg')}}" />
            <div class="black-player-controls-container">
                <span data-amplitude-song-info="name" data-amplitude-playlist="{{ $album_title_dashed }}"
                    class="song-name"></span>
                <span data-amplitude-song-info="artist" data-amplitude-playlist="{{ $album_title_dashed }}"
                    class="song-artist"></span>

                <div id="progress-container-black">
                    <input type="range" class="amplitude-song-slider"
                        data-amplitude-playlist="{{ $album_title_dashed }}" />
                    <progress id="song-played-progress-black" class="amplitude-song-played-progress"
                        data-amplitude-playlist="{{ $album_title_dashed }}"></progress>
                    <progress id="song-buffered-progress-black" class="amplitude-buffered-progress"
                        value="0"></progress>
                </div>

                <div>
                    <div class="amplitude-shuffle amplitude-shuffle-off"
                        data-amplitude-playlist="{{ $album_title_dashed }}" id="shuffle-black"></div>
                    <div class="amplitude-prev" data-amplitude-playlist="{{ $album_title_dashed }}"
                        id="previous-black"></div>
                    <div class="amplitude-play-pause" data-amplitude-playlist="{{ $album_title_dashed }}"
                        id="play-pause-black">
                    </div>
                    <div class="amplitude-next" data-amplitude-playlist="{{ $album_title_dashed }}" id="next-black">
                    </div>
                    <div class="amplitude-repeat" data-amplitude-playlist="{{ $album_title_dashed }}"
                        id="repeat-black"></div>
                </div>
            </div>
        </div>
    </div>
</div>
