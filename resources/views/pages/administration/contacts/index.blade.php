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
            <a href="{{ route('contacts.create') }}" class="btn btn-lg btn-block btn-outline-secondary btn-h1-spacing">Create New Contact</a>
        </div>
        <div class="col-md-12">
            <hr>
        </div>
    </div> <!-- end of .row -->
    <div class="row">   
        @foreach ($contacts as $contact)
            @include("includes.contacts.single_contact")
        @endforeach
    </div>
@endsection
