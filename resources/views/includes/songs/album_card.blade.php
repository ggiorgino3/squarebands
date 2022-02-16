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
    <div class="px-4 w-100">
        <ol>
            @foreach ($album->songs as $song)
                <div class="row">
                    <li>
                        <div class="w-100"> 
                            <a href=" {{ route('song.show', $song->id) }}">
                                {{ $song->name }}
                            </a>
                            
                            <span class="float-end">{{ $song->duration }}</span>
                         </div>
                    </li>
                </div>
            @endforeach
        </ol>
    </div>
</div>
