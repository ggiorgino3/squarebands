@push('styles')
    <link href="{{ asset('css/gallery.css') }}" rel="stylesheet">
@endpush
<div class="row">
    <div class="col-md-10">
        <h1>All Videos</h1>
    </div>

    <div class="col-md-2">
        <a href="{{ route('videos.create') }}" class="btn btn-lg btn-block btn-outline-secondary btn-h1-spacing">Insert new
            video</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div> <!-- end of .row -->

<div class="row">
    <div class="col-md-12">
        <!-- Gallery -->
            <div class="row">
                @for ($j = 0; $j < count($videos); $j++)
                    <div class="col-lg-4 mb-4 mb-lg-0 container">
                        <video class="w-100 rounded" loading="lazy" controls preload="metadata">
                            <source src="{{ $videos[$j]->uri }}#t=4"  type="video/mp4">
                        </video>
                        {{-- <img   class="w-100 image shadow-1-strong rounded mb-4"
                        alt="{{ $videos[$j]->name }}" /> --}}
                        <div class="overlay m-0 row">
                            <a class="col-6 p-0" href="{{ route('videos.show', $videos[$j]->id) }}"><div class="" >View</div></a>
                            <a class="col-6 p-0" href="{{ route('videos.edit', $videos[$j]->id) }}"><div class="" >Edit</div></a>
                        </div>

                    </div>
                @endfor
            </div>
        <div class="text-center">
            {{ $videos->links() }}
        </div>
    </div>
</div>
