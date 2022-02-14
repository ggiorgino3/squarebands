<div class="card hstack p-2 my-2">
    <div class="px-2 me-3 text-center" style="max-width: 200px">
        <img width="100" src="{{ $album->img ?? asset('assets/album/vynil.png') }}" />
        <h2 class="my-2">{{ $album->title }}</h2>
    </div>
    <span class="vr"></span>
    <div class="px-4 w-100">
        <ol>
            @foreach ($album->songs as $song)
                <div class="row">
                    <li>
                        <div class="w-100"> {{ $song->name }}
                            <span class="float-end">{{ $song->duration }}</span>
                         </div>
                    </li>
                </div>
            @endforeach
        </ol>
    </div>
</div>
