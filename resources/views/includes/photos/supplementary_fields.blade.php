@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        <div class="my-4">
            <h5><label for="caption">Caption</label> </h5>
            <input required type="text" name="caption" id="caption" />
        </div>
        <div class="my-4">
            <h5><label for="photo">Photo</label> </h5>
            <input required class="required" type="file" name="photo" id="photo" />
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
        <div class="my-4">
            <h5><label for="news">News</label></h5>
            <select  name="news" id="news_id">
                <option value="">-</option>
                @foreach ($newses as $id => $news)
                    <option value="{{ $id }}">{{ $news->title }}</option>
                @endforeach
            </select>
        </div>     
    </div>
@endsection
