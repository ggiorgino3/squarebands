@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        <div class="my-4">
            <h5><label for="video">Video</label> </h5>
            <input required class="required" type="file" name="video" id="video" />
        </div>
    </div>
    <div class="form-group">
        <div class="my-4">
            <h5><label for="concert">Concert</label></h5>
            <select  name="concert" id="concert_id">
                <option value="">-</option>
                @foreach ($concerts as $id => $concert)
                    <option value="{{ $id }}">{{ $concert->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
@endsection
