@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        {{ html()->label('Status', 'status') }}
        {{ html()->select('status', $statuses, Request::old('status', isset($model) ? $model->status : ''),) ->required() }}
    </div>
@endsection

