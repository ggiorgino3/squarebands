@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        {{ Form::label('status', 'Status') }}
        {{ Form::select('status', $statuses, Request::old('status', isset($model) ? $model->status : ''), ['required' => 'required']) }}
    </div>
@endsection

