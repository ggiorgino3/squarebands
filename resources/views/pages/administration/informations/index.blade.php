@extends('layouts.base_admin')
@push('styles')
    <style>
        .icons {
            font-size: 1.5rem
        }
    </style>
@endpush
@push('scripts')
    <script>
        const ROUTE_POST = "{{ route('informations.store') }}";
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('js/informations.js') }}" rel="stylesheet" ></script>    
    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('change', 'input[type="checkbox"]', function() {             
                var tr = event.target.closest('tr');
                $(".title", tr).prop('disabled', !this.checked);
               
            });
            var options = [];

            <?php foreach($options as $option): ?>
                options.push({
                    'id': "{{ $option->id }}",
                    'visible': "{{ $option->visible_on_frontend ? 'checked' : '' }}",
                    'key': "{{ $option->meta_key }}",
                    'title': "{{ $option->title }}",
                    'value': "{{ $option->meta_value }}"
                });
            <?php endforeach; ?>

            options.forEach(option => $('tbody').append(generate_row(option)));

            $('thead, tfoot').on('click', '.addRow', function() {
                $('tbody').append(generate_row());
            })
        });
    </script>
@endpush

@section('content')
    <h1>More Informations</h1>
    <table class="table table-striped">
        <thead class="thead">
            @include('includes.informations.table_columns')
        </thead>
        <tbody>
           
        </tbody>
        <tfoot class="thead">
            @include('includes.informations.table_columns')
        </tfoot>
    </table>
@endsection
