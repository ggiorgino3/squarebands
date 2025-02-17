@extends('layouts.base')
@section('content')
    @push('styles')
        <link href="{{ asset('css/contacts_index.css') }}" rel="stylesheet">
    @endpush
    <div class="row my-2 px-4 align-content-center">
        <div class="col-2"></div>
        <div class="col-8">
            <h1>Contact Us</h1>

            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
            {{ html()->form()->route('contact_us')->open() }}

            <div class="form-group my-2 required">
                {{ html()->label('Name', 'name' )}}
                {{ html()->text('name', Request::old('name'))->required()->class('form-control text-white') }}
            </div>
            <div class="form-group my-2 required">
                {{ html()->label('Email', 'email')->class('px-0') }}
                {{ html()->text('email', Request::old('email'))->class('form-control text-white')->required() }}
            </div>
            <div class="form-group my-2 ">
                {{ html()->label('Phone', 'phone')->class('px-0') }}
                {{ html()->text('phone', Request::old('phone'))->class('form-control text-white')->required() }}
            </div>
            <div class="form-group my-2 required">
                {{ html()->label('Subject', 'subject')->class('px-0') }}
                {{ html()->text('subject', Request::old('subject'))->class('form-control text-white')->required() }}
            </div>
            <div class="form-group my-2 required">
                {{ html()->label('Message', 'message',)->class('px-0') }}
                {{ html()->textarea('message', Request::old('message'))->class('form-control text-white')->required() }}
            </div>
            <div class="text-end py-2">
                {{ html()->submit('Submit form')->name('submit')->class('btn btn-success') }}
            </div>
            {{ html()->form()->close() }}
        </div>
        <div class="col-2"></div>
    </div>
    <hr/>
    <div class="row justify-center">
        <h1>Some of our contacts</h1>
        @foreach ($contacts as $contact)
            @include("includes.contacts.single_contact")
        @endforeach
    </div>
@endsection
