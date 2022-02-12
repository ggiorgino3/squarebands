@extends('layouts.base_admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
    function generate_row(id, key, value) {
        key ??= "";
        value ??= "";

        new_row =
            "<tr>" +
             
            "<td class='align-middle'>" 
                + `<div class="input-group my-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Info Name</span>
                        </div>
                        <input type='text' class='form-control' value='${key}' />` 
                        +
            "</td>" +
            "<td>" +
                 `<div class="input-group my-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1">Info Value</span>
                        </div>
                        <input type='text' class='form-control' value='${value}' />` +
            "</td>" +
            "<td class='align-middle'>" +
            `<div class="text-center"><a id="save" data-id="${id}" href="#"><i class="fas fa-save " style="font-size: 2rem;"></i></a></div>` +
            "</td>" +
            "</tr>";
        return new_row;
    }

    $(document).ready(function() {
        var options = [];

        <?php foreach($options as $option): ?>
        options.push({
            'id': "{{ $option->id }}",
            'key': "{{ $option->meta_key }}",
            'value': "{{ $option->meta_value }}"
        });
        <?php endforeach; ?>

        options.forEach(option => $('tbody').append(generate_row(option.id, option.key, option.value)));

        $('thead').on('click', '.addRow', function() {
            $('tbody').append(generate_row());
        })
    });
</script>

@section('content')
    <h1>More Informations</h1>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">
                    Information title
                </th>
                <th scope="col">
                    Information value
                </th>
                <th scope="col" class="text-center">
                    <a href="javascript:void(0)" class="addRow">
                        Add Information
                    </a>
                </th>
            </tr>
        </thead>
        <tbody>
           
        </tbody>
    </table>
@endsection
