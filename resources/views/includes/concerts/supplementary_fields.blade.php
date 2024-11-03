@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        <div class="my-4">
            {{ html()->label('Concert place name', 'place_name')->class('px-0') }}
            {{ html()->text('place_name', Request::old('place_name', isset($model) ? $model->place_name : ''))->placeholder('Stadium, Theater...')->required() }}
        </div>
        <div class="my-4">
            {{ html()->label('place_address', 'Concert place address')->class('px-0') }}
            {{ html()->text('place_address', Request::old('place_address', isset($model) ? $model->place_address : ''))->placeholder('Street..')->required() }}
        </div>
        <div class="my-4">
            {{ html()->label('Concert country','country_name')->class('px-0') }}
            {{ html()->text('country_name', Request::old('country_name', isset($model) ? $model->country_name : ''))->placeholder('Virginia, North Carolina')->required()}}
        </div>
        <div class="my-4">
            {{ html()->label('Concert city', 'city_name')->class('px-0') }}
            {{ html()->text('city_name', Request::old('city_name', isset($model) ? $model->city_name : ''))->placeholder('Sydney, Melbourne...')->required()}}
        </div>
        <div class="my-4">
            {{ html()->label('Concert Date / Hour', 'datetime', )->class('px-0') }}
            {{ html()->text('datetime', Request::old('datetime', isset($model) ? $model->datetime : ''))->required() }}
        </div>
    </div>
    <div class="my-4">
        {{ html()->label('Gates opening hour', 'gate_opening')->class('px-0') }}
        {{ html()->text('gate_opening', Request::old('gate_opening', isset($model) ? $model->gate_opening : '')) }}
    </div>
    <div class="my-4">
        {{ html()->label('Number of seatings','maximum_seating_no')->class('px-0') }}
        {{ html()->text('maximum_seating_no', Request::old('maximum_seating_no', isset($model) ? $model->maximum_seating_no : '')) }}
    </div>
    <div class="my-4">
        {{ html()->label('ticket_link', 'Ticket Website URL')->class('px-0') }}
        {{ html()->text('ticket_link', Request::old('ticket_link', isset($model) ? $model->ticket_link : '')) }}
    </div>
@endsection