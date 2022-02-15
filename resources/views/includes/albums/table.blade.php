<div class="row">
    <div class="col-md-10">
        <h1>All albums</h1>
    </div>

    <div class="col-md-2">
        <a href="{{ route('albums.create') }}" class="btn btn-lg btn-block btn-outline-secondary btn-h1-spacing">Create New Album</a>
    </div>
    <div class="col-md-12">
        <hr>
    </div>
</div> <!-- end of .row -->

<div class="row">
    <div class="col-md-12">
        <table class="table">
            <thead>
                <th>Title</th>
                <th>Genre</th>
                <th>Publish Date</th>
                <th></th>
            </thead>

            <tbody>
                @foreach ($albums as $album)
                    <tr>
                        <td>{{ $album->title }}</td>
                        <td>{{ $album->genre }}</td>
                        <td>{{ date('M j, Y', strtotime($album->publish_date)) }}</td>
                        <td>
                            <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-default btn-sm">Edit</a>
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
