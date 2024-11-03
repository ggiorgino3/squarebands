@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        <div class="my-4">
            {{ html()->label('caption', 'Caption',)->class('d-block') }}
            {{-- <h5><label for="caption">Caption</label> </h5> --}}
            {{-- <input required type="text" name="caption" id="caption" /> --}}
            {{ html()->text('caption', Request::old('caption', isset($model) ? $model->caption : ''))->required()->class('w-50') }}
        </div>
        <div class="my-4">
            <div>
                {{ html()->label('Photo', 'photo') }}
            </div>
            @isset($model->uri)
                <div class="w-50 my-2">
                    <img loading="lazy" src="{{ $model->uri }}" class="w-100 image shadow-1-strong rounded mb-4"
                         alt="{{ $model->name }}"/>
                </div>
            @endisset
            {{ html()->file('photo')->required() }}
        </div>
    </div>
    <div class="form-group">
        <div class="my-2">
            {{ html()->label('Concert', 'concert') }}
        </div>
        <div class="my-2">
            {{ html()->select('concert', $concerts, Request::old('concert', isset($model) ? $model->concert_id : '')) }}
        </div>
        <div class="my-2">
            {{ html()->label('News', 'news') }}
        </div>
        <div class="my-2">
            {{ html()->select('news', $newses, Request::old('news', isset($model) ? $model->news_id : '')) }}
        </div>
    </div>
@endsection
