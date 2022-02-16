<table class="table table_mh table-striped">
    <thead>
        @foreach ($columns as $column_name)
            <th>{{ $column_name }} </th>
        @endforeach
        <th></th>
    </thead>
    <tbody>
        @foreach ($elements as $element)
            <tr>
                @foreach ($columns as $id => $column_name)
                    <td>{{ $element->$id }}</td>
                @endforeach
                <td><a href="{{ route($route . '.edit', $element->id) }}" class="btn btn-default btn-sm">Edit</a></td>
            </tr>
        @endforeach
    </tbody>
</table>
