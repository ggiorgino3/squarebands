<div class="row">
    <div class="col-md-10">
        <h1>All news</h1>
    </div>
    <?php use \App\Http\Controllers\NewsController; ?>
    <div class="col-md-2">
        <a href="{{ route('news.create') }}" class="btn btn-lg btn-block btn-outline-secondary btn-h1-spacing">Create New News</a>
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
                <th>Status</th>
                <th></th>
            </thead>

            <tbody>
                @foreach ($newses as $news)
                    <tr>
                        <td>{{ $news->title }}</td>
                        <td>{{ NewsController::beautifyStatus($news->status); }}</td>
                        <td><a href="{{ route('news.show', $news->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('news.edit', $news->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {!! $newses->links(); !!}
        </div>
    </div>
</div>
