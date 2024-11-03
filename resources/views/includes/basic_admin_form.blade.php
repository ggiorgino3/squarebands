@push('styles')
    <link href="{{ asset('css/admin_form.css') }}" rel="stylesheet">
@endpush

@csrf
@if (isset($model))
    <h1>
        Edit {{ $element['title'] }} `{{ $model->name }}`
    </h1>
    {{ html()->modelForm($model, 'PUT', $route)->open() }}
@else
    <h1>
        Add new {{ $element['title'] }}
    </h1>
    {{ html()->form('PUT', $route)->open()
    //->open(
    //['route' => $route,  'files' => true]
    //)
     }}
@endif
@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if ($errors->any())
    {!! implode('', $errors->all('<div>:message</div>')) !!}
@endif
<div class="form-group required">
    <div class="row mx-0 my-2">
        {{ html()->label( ucfirst($element['title']) . ' name',$element['id'],)->class('px-0') }}
    </div>
    <div class="row mx-0 my-2">
        {{ html()->text($element['id'], Request::old($element['id']), ['placeholder' => ucfirst($element['title']) . ' name...']) }}
    </div>
    <div class="my-2">
        <div class="row mx-0 my-2">
            {{ html()->label('Description', 'description')->class('px-0') }}
        </div>
        <div class="row mx-0 my-2">
            {{ html()->textarea('description', Request::old('description')) }}
        </div>
    </div>
</div>

@yield("form_content")

<div class="text-end py-2">
    {{ html()->submit('Save ' . $element['title'])->name('submit')->class('btn btn-outline-success') }}
</div>

{{ html()->form()->close() }}
