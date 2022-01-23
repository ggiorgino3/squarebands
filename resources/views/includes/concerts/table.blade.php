<div class="row">
    <div class="col-md-10">
        <h1>All concerts</h1>
    </div>

    <div class="col-md-2">
        <a href="{{ route('concerts.create') }}" class="btn btn-lg btn-block btn-primary btn-h1-spacing">Create New Concert</a>
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
                <th>Place</th>
                <th>Country</th>
                <th>City</th>
                <th>Date - Time</th>
                <th></th>
            </thead>

            <tbody>
                
                @foreach ($concerts as $concert)
                    
                    <tr>
                        <td>{{ $concert->name }}</td>
                        <td>{{ substr($concert->place_name, 0, 50) }}{{ strlen($concert->place_name) > 50 ? "..." : "" }}</td>
                        <td>{{ $concert->country_name }}</td>
                        <td>{{ $concert->city_name }}</td>
                        <td>{{ date('M j, Y', strtotime($concert->datetime)) }}</td>
                        <td><a href="{{ route('concerts.show', $concert->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('concerts.edit', $concert->id) }}" class="btn btn-default btn-sm">Edit</a></td>
                    </tr>

                @endforeach

            </tbody>
        </table>

        <div class="text-center">
           {{--  {!! $concerts->links(); !!} --}}
        </div>
    </div>
</div>
