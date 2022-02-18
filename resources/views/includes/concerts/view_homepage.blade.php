<a href="{{ route('concerts.single', $concert->id) }}">
    <h4>
        {{ $concert->name }}
    </h4>
</a>
<div>
    {{ $concert->datetime }}
</div>
<hr/>

