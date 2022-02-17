@extends('layouts.base_admin')
@push('styles')
    <style>
        .icons {
            font-size: 1.5rem
        }

        .form-control,
        .form-control:focus {
            background-color: whitesmoke
        }
    </style>
@endpush
@push('scripts')
    <script>
        const ROUTE_POST = "{{ route('informations.store') }}";
        var appendOnHead = false;
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="{{ asset('js/informations.js') }}"></script>
    <script src="{{ asset('js/blockui.js') }}"></script>

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
                var value_input = $('#value', tr).val();
                var inputVal = $(tr).find("#value");
                if (this.checked)
                    inputVal.replaceWith(
                        "<textarea id='value' class='form-control'>" + value_input + "</textarea>"
                    );
                else
                    inputVal.replaceWith(
                        "<input type='text' id='value' class='form-control' value='" + value_input + "' />"
                    );
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

            $('thead').on('click', '.addRow', function() {
                appendOnHead = true;
                $('tbody').prepend(generate_row());
            })
            $('tfoot').on('click', '.addRow', function() {
                appendOnHead = false;
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
