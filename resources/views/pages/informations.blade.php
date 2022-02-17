@extends('layouts.base')

@section('content')
    <div class="px-4">

        <h1>Band Informations page</h1>
        @if ($bio)
            <div class="card bg-dark opacity-90 px-3">
                <h1 class="py-2">{{ $bio->title }}</h1>
                <p>{{ $bio->meta_value }}</p>
            </div>
        @endif

        <div class="row justify-center">
            @foreach ($members as $member)
                <div class="col-4 my-2">
                    <div class="mx-2 my-4 px-3 card h-100 bg-dark opacity-90">
                        <h1 class="text-center p-2">{{ $member->title }}</h1>
                        <img
                            style="object-fit: cover; height:300px; object-position:top" 
                            src="{{ $member->url_photo }}"
                            class=" w-75 rounded-circle my-2 mx-auto mt-3" alt="Contact image">
                        <p class="my-2">{{ $member->meta_value }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="py-3">
            <hr />
        </div>
        <h2>Other Informations</h2>
        <div class="row bg-dark opacity-90 p-2">
            @foreach ($informations as $information)
                <div class="info d-flex col-3 hstack">
                    <span class="vr me-3"></span>
                    <div class="col">
                        <h3>{{ $information->title }}</h3>
                        <p>{{ $information->meta_value }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
