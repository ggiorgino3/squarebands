@extends('layouts.base_admin')
@section('content')
    @push('styles')
    <link href="{{ asset('css/contacts_index.css') }}" rel="stylesheet">
    @endpush
    <div class="row">
        <div class="col-md-10">
            <h1>All contacts</h1>
        </div>
        <div class="col-md-2">
            <a href="{{ route('contacts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Contact</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div> <!-- end of .row -->
    <div class="row">   
        @foreach ($contacts as $contact)
        <div class="col-4">
            <div class="card mx-3 my-2">
                <img src="https://codingyaar.com/wp-content/uploads/bootstrap-profile-card-image.jpg" class="rounded-circle mt-3" alt="Contact image">
                <div class="card-body">
                    <a href="{{ route('contacts.edit', $contact->id) }}"><h5 class="card-title text-center">{{ $contact->name }} {{ $contact->surname }}</h5></a>
                    <p class="card-text">
                        <div class="row px-0">
                            <div class="col-12 mb-1">
                                <i class="fas fa-at pe-2 "></i>{{ $contact->email }}
                            </div>
                            <div class="col-12 mb-1">
                                <i class="fas fa-phone-alt pe-2 "></i>{{ $contact->phone }}       
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <i class="fas fa-map-marker-alt pe-2"></i>{{ $contact->address }}        
                            </div>
                            <div class="col-6">
                                <i class="fas fa-briefcase pe-2"></i>{{ $contact->business_title }}        
                            </div>
                        </div>
                    </p>
                </div>
              </div>
        </div>
        @endforeach
    </div>
@endsection
