<div class="px-2 my-3 py-2 me-3 text-center">
    <img width="100" src="{{ $album->photo->uri ?? asset('assets/album/vynil.png') }}" />
    <h2 class="my-2">{{ $album->title }}</h2>
    <div class="text-center genre">
        <div class="badge rounded-pill bg-secondary">
            <img src="{{ asset('assets/album/hand.png') }}" alt="hand" />
            {{ $album->genre }}
            <img src="{{ asset('assets/album/hand.png') }}" alt="hand" />
        </div>
    </div>
</div>