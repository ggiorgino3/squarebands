@extends('layouts.base_admin')
@section('content')
    @if (isset($model))
        <h1>
            Edit administrator `{{ $model->name }}`
        </h1>
        {{ html()->modelForm($model, 'PUT', route($route, $model->id))->open() }}
    @else
        <h1> Add new administrator </h1>
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
                {{ html()->label('Administrator name', 'name')->class('px-0') }}
                {{ html()->text('name', Request::old('name'))->required() }}
            </div>

            <div class="row mx-0 my-2">
                {{ html()->label( 'Administrator email', 'email')->class('px-0') }}
                {{ html()->text('email', Request::old('email'))->required() }}

                {{ html()->label('Password', 'password')->class('px-0') }}
                {{ html()->input('password', 'password', "●●●●")->required() }}
            </div>
        </div>

        <div class="text-end py-2">
            {{ html()->submit('Save Administrator')->name('submit')->class('btn btn-outline-success') }}
        </div>
    </div>

    {{ html()->form()->close() }}

@endsection

