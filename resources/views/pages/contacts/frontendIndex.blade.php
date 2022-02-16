@extends('layouts.base')
@section('content')
    @push('styles')
        <link href="{{ asset('css/contacts_index.css') }}" rel="stylesheet">
    @endpush
    <div class="row my-2 px-4 align-content-center">
        <div class="col-8">
            <h1>Contact Us</h1>
            <form method="post" action="{{ route('contact_us') }}">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                </div>
                <div class="form-group">
                    <label>Subject</label>
                    <input type="text" class="form-control" name="subject" id="subject">
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea class="form-control" name="message" id="message" rows="4"></textarea>
                </div>
                <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
            </form>
        </div>
    </div>
    <hr/>
    <div class="row">
        <h1>Some of our contacts</h1>
        @foreach ($contacts as $contact)
            @include("includes.contacts.single_contact")
        @endforeach

    </div>
@endsection
