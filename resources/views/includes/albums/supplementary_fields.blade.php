@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        <div class="my-2">
            {{ html()->label('Genre', 'genre') }}
            {{ html()->select('genre',['Progressive Metal' => 'Progressive Metal', 'Hard Rock' => 'Hard Rock', 'Fusion' => 'Fusion'],Request::old('genre', isset($model) ? $model->genre : ''))->required() }}
        </div>
    </div>
    <div class="my-4">
        {{ html()->label('Publish Date', 'publish_date')->class('px-0') }}
        {{ html()->text('publish_date', Request::old('publish_date', isset($model) ? $model->publish_date : ''))->placeholder('Format YYYY-MM-DD')->required() }}
    </div>
    @isset($model->songs)
        <h3>Related songs</h3>
        <table class="table w-50">
            <th>Song Title</th>
            @foreach ($model->songs as $song)
                <tr>
                    <td><a href="{{ route('songs.edit', $song->id) }}">{{ $song->name }}</a></td>
                </tr>
            @endforeach
        </table>
    @endisset
@endsection
