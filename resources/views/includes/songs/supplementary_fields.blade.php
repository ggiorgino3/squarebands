@extends('includes.basic_admin_form')
@section('form_content')

    <div class="form-group required">
        <div class="my-4">
            <h5><label for="uri">URI</label> </h5>
            <input required type="text" name="uri" id="uri" placeholder="https://..." />
        </div>
        <div class="my-4">
            <h5><label for="genre">Genre</label></h5>
            <select required name="genre" id="genre">
                <option value="Progressive Metal">Progressive Metal</option>
                <option value="Hard Rock">Hard Rock</option>
                <option value="Fusion">Fusion</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <div class="my-4">
            <h5><label for="album">Album</label></h5>
            <select  name="album" id="album">
                <option value="">-</option>
                @foreach ($albums as $id => $album_name)
                    <option value="{{ $id }}">{{ $album_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="my-4 row">
            <h5><label for="tags">Song Tags</label> </h5>
            <input type="text" name="tags" id="tags" placeholder="Separate each tag with a comma" />
        </div>
    </div>

@endsection
