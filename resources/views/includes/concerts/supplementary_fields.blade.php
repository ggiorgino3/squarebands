@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        <div class="my-4">
            <h5><label for="place_name">Concert place name</label> </h5>
            <input required type="text" name="place_name" id="place_name" placeholder="Stadium, Theater..."/>
        </div>
        <div class="my-4">
            <h5><label for="place_address">Concert place address</label></h5>
            <input required type="text" name="place_address" id="place_address" placeholder="Street..."/>
        </div>
        <div class="my-4">
            <h5><label for="country_name">Concert country</label></h5>
            <input required type="text" name="country_name" id="country_name" placeholder="Virginia, North Carolina"/>
        </div>
        <div class="my-4">
            <h5><label for="city_name">Concert city</label></h5>
            <input required type="text" name="city_name" id="city_name" placeholder="Sydney, Melbourne..."/>
        </div>
        <div class="my-4">
            <h5><label for="datetime">Concert Date / Hour</label></h5>
            <input required type="datetime" name="datetime" id="datetime" />
        </div>
    </div>
    <div class="my-4">
        <h5><label for="gate_opening">Gates opening hour</label></h5>
        <input type="gate_opening" name="gate_opening" id="gate_opening" />
    </div>
    <div class="my-4">
        <h5><label for="maximum_seating_no">Number of seatings</label></h5>
        <input type="maximum_seating_no" name="maximum_seating_no" id="maximum_seating_no" />
    </div>
    <div class="my-4">
        <h5><label for="ticket_link">Ticket website url</label></h5>
        <input type="ticket_link" name="ticket_link" id="ticket_link" />
    </div>

@endsection

