@extends('layouts.base')
@section('content')
    @push('styles')
        <link href="{{ asset('css/contacts_index.css') }}" rel="stylesheet">
    @endpush
    <div class="row my-2 px-4 align-content-center">
        <div class="col-2">        </div>
        <div class="col-8">
            <h1>Contact Us</h1>

            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif
            @if($errors->any())
                {!! implode('', $errors->all('<div>:message</div>')) !!}
            @endif
            {{ Form::open(['route' => 'contact_us' ]) }}
            
            <div class="form-group my-2 required">
                {{ Form::label('name', 'Name', ['class' => 'px-0']) }}
                {{ Form::text('name', Request::old('name'), ['class' =>"form-control text-white",'required' => true]) }}
            </div>
            <div class="form-group my-2 required">
                {{ Form::label('email', 'Email', ['class' => 'px-0']) }}
                {{ Form::text('email', Request::old('email'), ['class' =>"form-control text-white",'required' => true]) }}
            </div>
            <div class="form-group my-2 ">
                {{ Form::label('phone', 'Phone', ['class' => 'px-0']) }}
                {{ Form::text('phone', Request::old('phone'), ['class' =>"form-control text-white ",'required' => true]) }}
            </div>
            <div class="form-group my-2 required">
                {{ Form::label('subject', 'Subject', ['class' => 'px-0']) }}
                {{ Form::text('subject', Request::old('subject'), ['class' =>"form-control text-white",'required' => true]) }}
            </div>
            <div class="form-group my-2 required">
                {{ Form::label('message', 'Message', ['class' => 'px-0']) }}
                {{ Form::textarea('message', Request::old('message'), ['class' =>"form-control text-white",'required' => true]) }}
            </div>
            <div class="text-end py-2">
                {{ Form::submit('Submit form', ['name' => 'submit', 'class' => 'btn btn-success']) }}
            </div>
            {{ Form::close() }}
        </div>
        <div class="col-2">        </div>
    </div>
    <hr/>
    <div class="row justify-center">
        <h1>Some of our contacts</h1>
        @foreach ($contacts as $contact)
            @include("includes.contacts.single_contact")
        @endforeach
    </div>
@endsection
