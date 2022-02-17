<div class="row news text-start my-3 p-2">
    @foreach ($news as $single_news)
    <div class="col-12 w-100 ">
        <h3>
           {{$single_news->title}} 
        </h3>
        <p class="text-truncate">
            {{$single_news->description}} 
        </p>
        <div class="row w-100">
            <a class="text-end" href="{{ route('news.single.show', $single_news->id) }}">Read More...</a>
        </div>

        <footer>
            {{ $single_news->updated_at }}
        </footer>
    </div>
    <hr/>
    @endforeach
</div>