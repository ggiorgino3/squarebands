<div class="row">
    <div class="col-md-10">
        <h1>All administrators</h1>
    </div>

    <div class="col-md-2">
        <a href="{{ route('admins.create') }}" class="btn btn-lg btn-block btn-outline-secondary btn-h1-spacing">Create New Administrator</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div> <!-- end of .row -->

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th></th>
            </thead>

            <tbody>
                
                @foreach ($admins as $admin)
                    
                    <tr>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <a data-id="{{$admin->id}}" href="{{ route('admins.edit', $admin->id) }}" class="btn btn-default btn-sm">Edit</a>
                            @if (Auth::id() !== $admin->id)
                            <a id="delete" data-id="{{$admin->id}}" class="btn btn-default btn-sm">Delete</a>
                            @endif
                        </td>
                    </tr>

                @endforeach

            </tbody>
        </table>

        <div class="text-center">
           {{--  {!! $concerts->links(); !!} --}}
        </div>
    </div>
</div>
