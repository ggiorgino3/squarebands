@extends('layouts.base_admin')
@section('content')

    @push('styles')
        <link href="{{ asset('css/admin_form.css') }}" rel="stylesheet">
    @endpush
    @if (isset($model))
        <h1>
            Edit contact `{{ $model->name }} {{ $model->surname }}`
        </h1>
        {{ html()->modelForm($model, 'PUT', route($route, $model->id))->open() }}
    @else
        <h1>
            Add new contact
        </h1>
        {{ html()->form()->route($route)->open() }}
    @endif

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @csrf
    <div class="container">
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
        <div class="form-group required">

            <div class="row mx-0 my-2">
                {{ html()->label('Contact name','name')->class('px-0') }}
                {{ html()->text('name', Request::old('name'))->required() }}

                {{ html()->label('Contact surname','surname')->class('px-0') }}
                {{ html()->text('surname', Request::old('surname'))->required() }}
            </div>

            <div class="row mx-0 my-2">

                {{ html()->label('Contact email','email')->class('px-0') }}
                {{ html()->text('email', Request::old('email'))->required() }}


                {{ html()->label('Contact phone','phone')->class('px-0') }}
                {{ html()->text('phone', Request::old('phone'))->required() }}

                {{ html()->label('Contact address','address')->class('px-0') }}
                {{ html()->text('address', Request::old('address'))->required() }}

                {{ html()->label('Contact Business Title','business_title')->class('px-0') }}
                {{ html()->text('business_title', Request::old('business_title'))->required() }}

            </div>
        </div>

        <div class="text-end py-2">
            {{ html()->submit('Save contact')->name('submit')->class('btn btn-outline-success') }}
        </div>
    </div>
    {{ html()->form()->close() }}

@endsection
