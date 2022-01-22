<div class="navbar">
    <div class="navbar-inner">
        <a id="logo" class="navbar-brand" href="/" >Dream Theater Logo</a>
        @foreach ($socials as $id => $url)
            <a href="{{ $url }}" class="px-3 social" id="social_{{ $id }}">
                <i class="social_icon fa-brands fa-{{$id}}"></i>
            </a>
        @endforeach
        <ul class="nav">
            @foreach ($pages as $title => $url)
                <li class="mx-4"><a href="/{{ $url }}">{{ $title }}</a></li>
            @endforeach
        </ul>
    </div>
</div>