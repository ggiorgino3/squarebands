@extends('includes.basic_admin_form')
@section('form_content')

    <div class="form-group required">
        <div class="my-2">
            {{ Form::label('uri', 'URI') }}
        </div>
        <div class="my-2">
            {{ Form::text('uri', Request::old('uri', isset($model) ? $model->uri : ''), ['placeholder' => 'https://...', 'required' => 'required', 'class' => 'w-100']) }}
        </div>

        <div class="my-2">
            {{ Form::label('genre', 'Genre') }}
        </div>
        <div class="my-2">
            {{ Form::select('genre', ['Progressive Metal', 'Hard Rock', 'Fusion'], Request::old('genre', isset($model) ? $model->genre : ''), ['required' => 'required']) }}
        </div>
    </div>
    <div class="form-group">

        <div class="my-2">
            {{ Form::label('album', 'Album') }}
        </div>
        <div class="my-2">
            {{ Form::select('album', $albums, Request::old('album', isset($model) ? $model->album_id : '')) }}
        </div>

        <div class="my-2">
            {{ Form::label('duration', 'Duration') }}
        </div>
        <div class="my-2">
            {{ Form::text('duration', Request::old('duration', isset($model) ? $model->duration : ''), ['placeholder' => "Format e.g. mm:ss"]) }}
        </div>

        <div class="my-2">
            {{ Form::label('tags', 'Song Tags') }}
        </div>
        <div class="my-2 ">
            {{ Form::text('tags', Request::old('tags', isset($model) ? $model->tags : ''), ['placeholder' => 'Separate each tag with a comma', 'class' => 'w-100']) }}
        </div>
    </div>

@endsection
