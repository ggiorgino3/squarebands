<div class="row">
    <div class="col-md-10">
        <h1>All photos</h1>
    </div>

    <div class="col-md-2">
        <a href="{{ route('photos.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Insert new
            photo</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div> <!-- end of .row -->

<div class="row">
    <div class="col-md-12">
        <!-- Gallery -->
        <?php $base_count = 0; ?>
        @for ($i = 0; $i < $countDividedPhotos; $i++)
            <div class="row">
                @for ($i = $base_count; $i < $base_count + 3; $i++)
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <img src="{{ $photos[$i]->uri }}" class="w-100 shadow-1-strong rounded mb-4"
                            alt="{{ $photos[$i]->name }}" />
                    </div>
                @endfor
                <?php $base_count += 3; ?>
            </div>
        @endfor
        {{-- <div class="text-center">
            {!! $posts->links() !!}
        </div> --}}
    </div>
</div>
