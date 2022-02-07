@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        <div class="my-4">
            {{ Form::label('place_name', 'Concert place name', ['class' => 'px-0']) }}
            {{ Form::text('place_name', Request::old('place_name', isset($model) ? $model->place_name : ''), ['placeholder' => 'Stadium, Theater...','required' => 'required']) }}
        </div>
        <div class="my-4">
            {{ Form::label('place_address', 'Concert place address', ['class' => 'px-0']) }}
            {{ Form::text('place_address', Request::old('place_address', isset($model) ? $model->place_address : ''), ['placeholder' => 'Street...','required' => 'required']) }}
        </div>
        <div class="my-4">
            {{ Form::label('country_name', 'Concert country', ['class' => 'px-0']) }}
            {{ Form::text('country_name', Request::old('country_name', isset($model) ? $model->country_name : ''), ['placeholder' => 'Virginia, North Carolina','required' => 'required']) }}
        </div>
        <div class="my-4">
            {{ Form::label('city_name', 'Concert city', ['class' => 'px-0']) }}
            {{ Form::text('city_name', Request::old('city_name', isset($model) ? $model->city_name : ''), ['placeholder' => 'Sydney, Melbourne...','required' => 'required']) }}
        </div>
        <div class="my-4">
            {{ Form::label('datetime', 'Concert Date / Hour', ['class' => 'px-0']) }}
            {{ Form::text('datetime', Request::old('datetime', isset($model) ? $model->datetime : ''), ['placeholder' => '','required' => 'required']) }}
        </div>
    </div>
    <div class="my-4">
        {{ Form::label('gate_opening', 'Gates opening hour', ['class' => 'px-0']) }}
        {{ Form::text('gate_opening', Request::old('gate_opening', isset($model) ? $model->gate_opening : '')) }}
    </div>
    <div class="my-4">
        {{ Form::label('maximum_seating_no', 'Number of seatings', ['class' => 'px-0']) }}
        {{ Form::text('maximum_seating_no', Request::old('maximum_seating_no', isset($model) ? $model->maximum_seating_no : '')) }}
    </div>
    <div class="my-4">
        {{ Form::label('ticket_link', 'Ticket Website URL', ['class' => 'px-0']) }}
        {{ Form::text('ticket_link', Request::old('ticket_link', isset($model) ? $model->ticket_link : '')) }}
    </div>
@endsection