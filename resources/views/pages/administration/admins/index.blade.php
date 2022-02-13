@extends('layouts.base_admin')
@push("scripts")    
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script>
    const ROUTE_POST = "{{ route('admins.store') }}";

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });
</script>
<script src="{{ asset('js/users.js') }}"></script>    

@endpush
@section('content')

    @include('includes.admins.table')
@endsection