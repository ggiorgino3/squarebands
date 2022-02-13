@push('styles')
    <link href="{{ asset('css/gallery.css') }}" rel="stylesheet">
@endpush
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
                @for ($j = $base_count; $j < $base_count + 3 && $j < count($photos); $j++)
                    <div class="col-lg-4 mb-4 mb-lg-0 container">
                        <img loading="lazy" src="{{ $photos[$j]->uri }}" class="w-100 image shadow-1-strong rounded mb-4"
                        alt="{{ $photos[$j]->name }}" />
                        <div class="overlay m-0 row">
                            <a class="col-6 p-0" href="{{ route('photos.show', $photos[$j]->id) }}"><div class="" >View</div></a>
                            <a class="col-6 p-0" href="{{ route('photos.edit', $photos[$j]->id) }}"><div class="" >Edit</div></a>
                        </div>

                    </div>
                @endfor
                <?php $base_count += 3 ?>
            </div>
        @endfor
         <div class="text-center">
            {!! $photos->links() !!}
        </div> 
    </div>
</div>
