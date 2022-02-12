@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        <div class="my-2">
            {{ Form::label('genre', 'Genre') }}
            {{ Form::select('genre', ['Progressive Metal' => 'Progressive Metal','Hard Rock' => 'Hard Rock',  'Fusion' =>'Fusion'], Request::old('genre', isset($model) ? $model->genre : ''), ['required' => 'required']) }}
        </div>
    </div>
    <div class="my-4">
        {{ Form::label('publish_date', 'Publish Date', ['class' => 'px-0']) }}
        {{ Form::text('publish_date', Request::old('publish_date', isset($model) ? $model->publish_date : ''), ['placeholder' => 'Format YYYY-MM-DD','required' => 'required']) }}
    </div>
@endsection

