@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        <div class="my-4">
            {{ Form::label('video', 'Video') }}
            {{ Form::file('video', ['required' => 'required'] ) }}
        </div>
    </div>
    <div class="form-group">
        <div class="my-4">
            <div class="my-2">
                {{ Form::label('concert', 'Concert') }}
            </div>
            <div class="my-2">
                {{ Form::select('concert', $concerts, Request::old('concert', isset($model) ? $model->concert_id : '')) }}
            </div>
        </div>
    </div>
@endsection
