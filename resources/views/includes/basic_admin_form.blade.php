@push('styles')
    <link href="{{ asset('css/admin_form.css') }}" rel="stylesheet">
@endpush

<form action="{{ $post_route }}" method="POST">
    <h1>
        Add new {{ $element_title }}
    </h1>
    <div class="container">
        
        <div class="form-group required">
            <div class="row mx-0 my-2">
                <h5 class=" px-0"><label for="{{ $element_title }}_title">{{ ucfirst($element_title) }} name</label> </h5>
                <input required width="100" class="px-1" type="text" name="{{ $element_title }}_title"
                    id="{{ $element_title }}_title" placeholder="{{ ucfirst($element_title) . ' name...' }} ">
            </div>
            <div class="my-2">
                <h5 ><label for="description">Description</label> </h5>
                <textarea required name="description" id="description" cols="30" rows="10"></textarea>
            </div>
        </div>
        @yield("form_content")

        <div class="text-end py-2">
            <button class="btn btn-outline-success" type="submit">Save {{ $element_title }}</button>
        </div>
    </div>
</form>
