<div class="navbar mt-2">
    <div class="navbar-inner  mt-2 w-100">
        <a id="logo" class="navbar-brand" href="/"> <img src="{{ asset('photos/logo.svg') }}" width="200px"
                alt="Dream Theater Logo" class="d-inline-block align-middle mr-2">
        </a>
        <a href="{{ route('administration.homepage') }}"><img class="float-end mx-4 mt-2" src="{{ asset('assets/icon_admin.png') }}" width="100%" style="max-width: 30px" /></a>
        @foreach ($socials as $id => $url)
            <a href="{{ $url }}" class="px-3 social float-end" id="social_{{ $id }}">
                <i class="social_icon fa-brands fa-{{ $id }}"></i>
            </a>
        @endforeach
    </div>
    <div class="row mx-5 w-100">
        <ul class="nav my-4 justify-content-between">
            @foreach ($pages as $title => $url)
                <li class="mx-4"><a href="/{{ $url }}">{{ $title }}</a></li>
            @endforeach
        </ul>
    </div>

</div>
