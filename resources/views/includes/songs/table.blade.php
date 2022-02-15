<div class="row">
    <div class="col-md-10">
        <h1>All songs</h1>
    </div>

    <div class="col-md-2">
        <a href="{{ route('songs.create') }}" class="btn btn-lg btn-block btn-outline-secondary btn-h1-spacing">Create New Song</a>
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
                <th>Album</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($songs as $song)
                    <tr>
                        <td>{{ $song->name }}</td>
                        <td>{{ $song->album->title ?? '-' }}</td>
                        <td>
                            <a href="{{ route('songs.edit', $song->id) }}" class="btn btn-default btn-sm">Edit</a>
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
