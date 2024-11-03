@extends('includes.basic_admin_form')
@section('form_content')
    <div class="form-group required">
        <div class="my-4">
            <div>
                {{ html()->label('Video', 'video') }}
            </div>
            @isset($model->uri)
                <video class="w-50 d-block rounded" loading="lazy" controls preload="metadata">
                    <source src="{{ $model->uri }}#t=4" type="video/mp4">
                </video>
            @endisset
            {{ html()->file('video' )->required()->class('my-3') }}
        </div>
    </div>
    <div class="form-group">
        <div class="my-4">
            <div class="my-2">
                {{ html()->label('Concert', 'concert') }}
            </div>
            <div class="my-2">
                {{ html()->select('concert', $concerts, Request::old('concert', isset($model) ? $model->concert_id : '')) }}
            </div>
        </div>
    </div>
@endsection
