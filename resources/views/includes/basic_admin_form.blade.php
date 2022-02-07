@push('styles')
    <link href="{{ asset('css/admin_form.css') }}" rel="stylesheet">
@endpush

@csrf
@if (isset($model))
    <h1>
        Edit {{ $element['title'] }} `{{ $model->name }}`
    </h1>
    {{ Form::model($model, [
        'route' => [$route, $model->id],
        'method' => 'put',
        'files' => true,
    ]) }}
@else
    <h1>
        Add new {{ $element['title'] }}
    </h1>
    {{ Form::open(['route' => $route]) }}
@endif
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if ($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
<div class="form-group required">
    <div class="row mx-0 my-2">
        {{ Form::label($element['id'], ucfirst($element['title']) . ' name', ['class' => 'px-0']) }}
    </div>
    <div class="row mx-0 my-2">
        {{ Form::text($element['id'], Request::old($element['id']), ['placeholder' => ucfirst($element['title']) . ' name...']) }}
    </div>
    <div class="my-2">
        <div class="row mx-0 my-2">
            {{ Form::label('description', 'Description', ['class' => 'px-0']) }}
        </div>
        <div class="row mx-0 my-2">
            {{ Form::textarea('description', Request::old('description')) }}
        </div>
    </div>
</div>

@yield("form_content")

<div class="text-end py-2">
    {{ Form::submit('Save ' . $element['title'], ['name' => 'submit', 'class' => 'btn btn-outline-success']) }}
</div>
{{ Form::close() }}
