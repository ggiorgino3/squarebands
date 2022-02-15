<div class="row my-4 justify-center">
    <div class="card bg-dark w-75 concert_bg_img text-white rounded_custom">
        <div class="row text-center px-4 pt-2">
            <h1 >{{ $concert->name}}</h1> <br/>
        </div>
        <div class="row concert_info align-content-center">
            <div class="col-6 text-start px-4">
                <h3>
                    {{ $concert->place_name}}, <br/>
                    {{ $concert->city_name}}
                </h3>
                <h4>
                    {{ $concert->datetime}}
                </h4>
            </div>
            <div class="col-6 text-end px-4">
                @if ($concert->ticket_link)
                    <h2><a href="{{ $concert->ticket_link }}">Buy Now!</a></h2>
                @endif
                <h4>
                    <a href="{{ route('concerts.single', $concert->id) }}">
                        Show More
                    </a>
                </h4>
            </div>
        </div>
    </div>
</div>