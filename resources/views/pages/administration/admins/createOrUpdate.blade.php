@extends('layouts.base_admin')
@section('content')
@if (isset($model))
<h1>
    Edit administrator `{{ $model->name }}`
</h1>
{{ Form::model($model, [
    'route' => [$route, $model->id],
    'method' => 'put',
]) }}
@else
<h1>
    Add new administrator
</h1>
{{ Form::open(['route' => $route]) }}
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
            {{ Form::label('name', 'Administrator name', ['class' => 'px-0']) }}
            {{ Form::text('name', Request::old('name'), ['required' => true]) }}
        </div>

        <div class="row mx-0 my-2">
            {{ Form::label('email', 'Administrator email', ['class' => 'px-0']) }}
            {{ Form::text('email', Request::old('email'), ['required' => true]) }}
            
            {{ Form::label('password', 'Password', ['class' => 'px-0']) }}
            {{ Form::password('password', Request::old('password'), ['required' => true]) }}
        </div>
    </div>
   
    <div class="text-end py-2">
        {{ Form::submit('Save Administrator', ['name' => 'submit', 'class' => 'btn btn-outline-success']) }}
    </div>
</div>

{{ Form::close() }}

@endsection

