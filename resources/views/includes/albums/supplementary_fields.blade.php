@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        <h5><label for="genre">Genre</label></h5>
        <select required name="genre" id="genre">
            <option value="Progressive Metal">Progressive Metal</option>
            <option value="Hard Rock">Hard Rock</option>
            <option value="Fusion">Fusion</option>
        </select>
    </div>
    <div class="my-4">
        <h5><label for="publish_date">Publish Date</label> </h5>
        <input type="text" name="place_name" id="publish_date" placeholder="Format YYYY-MM-DD"/>
    </div>
@endsection

