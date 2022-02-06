@extends('layouts.base_admin')
@section('content')

@push('styles')
    <link href="{{ asset('css/admin_form.css') }}" rel="stylesheet">
@endpush

<form action="{{ $postRoute }}" method="POST" enctype="multipart/form-data">
    @csrf
    <h1> Add new Contact </h1>
    <div class="container">
        @if($errors->any())
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        @endif
        <div class="form-group required">

            <div class="row mx-0 my-2">
                <h5 class=" px-0"><label for="name">Contact name</label> </h5>
                <input required width="100" class="px-1" type="text" name="name"
                    id="name">

                <h5 class=" px-0"><label for="surname">Contact surname</label> </h5>
                <input required width="100" class="px-1" type="text" name="surname"
                    id="surname">
            </div>

            <div class="row mx-0 my-2">
                <h5 class=" px-0"><label for="email">E-mail</label> </h5>
                <input required width="100" class="px-1" type="text" name="email"
                    id="email">

                <h5 class=" px-0"><label for="phone">Contact phone</label> </h5>
                <input required width="100" class="px-1" type="text" name="phone"
                    id="phone">

                <h5 class=" px-0"><label for="address">Contact address</label> </h5>
                <input required width="100" class="px-1" type="text" name="address"
                    id="address">

                <h5 class=" px-0"><label for="business_title">Business Title</label> </h5>
                <input required width="100" class="px-1" type="text" name="business_title"
                    id="business_title">
            </div>
        </div>
       
        <div class="text-end py-2">
            <button class="btn btn-outline-success" type="submit">Save contact</button>
        </div>
    </div>
</form>

@endsection
