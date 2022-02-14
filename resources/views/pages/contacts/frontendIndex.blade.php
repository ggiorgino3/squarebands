@extends('layouts.base')
@section('content')
    @push('styles')
    <link href="{{ asset('css/contacts_index.css') }}" rel="stylesheet">
    @endpush
    <div class="row">   
        @foreach ($contacts as $contact)
            @include("includes.contacts.single_contact")
        @endforeach
    </div>
@endsection
