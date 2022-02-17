<a href="{{ route('concerts.show', $concert->id) }}">
    <h4>
        {{ $concert->name }}
    </h4>
</a>
<div>
    {{ $concert->datetime }}
</div>
<hr/>

