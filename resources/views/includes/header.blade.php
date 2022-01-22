<div class="navbar">
    <div class="navbar-inner">
        <a id="logo" href="/">Dream Theater Logo</a>
        @foreach ($socials as $id => $url)
            <a href="{{ $url }}" class="social" id="social_{{ $id }}">
                <i class="fa-brands fa-{{$id}}"></i>
            </a>
        @endforeach
        <ul class="nav">
            @foreach ($pages as $title => $url)
                <li class="mx-4"><a href="/{{ $url }}">{{ $title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>