@extends('layouts.base_admin')
@section('content')

@push('styles')
    <link href="{{ asset('css/admin_form.css') }}" rel="stylesheet">
@endpush
@if (isset($model))
    <h1>
        Edit contact `{{ $model->name }} {{ $model->surname }}`
    </h1>
    {{ Form::model($model, [
        'route' => [$route, $model->id],
        'method' => 'put',
        'files' => true,
    ]) }}
@else
    <h1>
        Add new contact
    </h1>
    {{ Form::open(['route' => $route,  'files' => true,]) }}
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
                {{ Form::label('name', 'Contact name', ['class' => 'px-0']) }}
                {{ Form::text('name', Request::old('name'), ['required' => true]) }}
                           
                {{ Form::label('surname', 'Contact surname', ['class' => 'px-0']) }}
                {{ Form::text('surname', Request::old('surname'), ['required' => true]) }}
            </div>

            <div class="row mx-0 my-2">
                {{ Form::label('email', 'Contact email', ['class' => 'px-0']) }}
                {{ Form::text('email', Request::old('email'), ['required' => true]) }}
                
                {{ Form::label('phone', 'Contact phone', ['class' => 'px-0']) }}
                {{ Form::text('phone', Request::old('phone'), ['required' => true]) }}
                
                {{ Form::label('address', 'Contact address', ['class' => 'px-0']) }}
                {{ Form::text('address', Request::old('address'), ['required' => true]) }}
                
                {{ Form::label('business_title', 'Contact Business Title', ['class' => 'px-0']) }}
                {{ Form::text('business_title', Request::old('business_title'), ['required' => true]) }}
            </div>
        </div>
       
        <div class="text-end py-2">
            {{ Form::submit('Save contact', ['name' => 'submit', 'class' => 'btn btn-outline-success']) }}
        </div>
    </div>
    {{ Form::close() }}


@endsection
