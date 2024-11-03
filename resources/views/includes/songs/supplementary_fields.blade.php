@extends('includes.basic_admin_form')
@section('form_content')

    <div class="form-group required">
        <div class="my-2">
            {{ html()->label('Song', 'song') }}
        </div>
        <div class="my-2">
            @isset($model->uri)
                <div class="w-50 my-2">
                    <audio controls>
                        <source src="{{ $model->uri }}" type="audio/mpeg">
                        Your browser does not support the audio tag.
                    </audio>
                </div>
            @endisset
            {{ html()->file('song', )->required() }}
        </div>

        <div class="my-2">
            {{ html()->label('Genre', 'genre') }}
        </div>
        <div class="my-2">
            {{ html()->select('genre', ['Progressive Metal', 'Hard Rock', 'Fusion'], Request::old('genre', isset($model) ? $model->genre : ''))->required() }}
        </div>
    </div>
    <div class="form-group">

        <div class="my-2">
            {{ html()->label('Album', 'album') }}
        </div>
        <div class="my-2">
            {{ html()->select('album', $albums, Request::old('album', isset($model) ? $model->album_id : '')) }}
        </div>

        <div class="my-2">
            {{ html()->label('Duration', 'duration') }}
        </div>
        <div class="my-2">
            {{ html()->text('duration', Request::old('duration', isset($model) ? $model->duration : ''))->placeholder('Format e.g. mm:ss') }}
        </div>

        <div class="my-2">
            {{ html()->label('Song Tags', 'tags') }}
        </div>
        <div class="my-2 ">
            {{ html()->text('tags', Request::old('tags', isset($model) ? $model->tags : ''))->placeholder('Separate each tag with a comma')->class('w-100') }}
        </div>
    </div>

@endsection
