<div class="navbar mt-2">
    <div class="navbar-inner hstack mt-2 w-100">
        <a id="logo" class="navbar-brand" href="/"> <img src="{{ asset('photos/logo.svg') }}" width="200px"
                alt="Dream Theater Logo" class="d-inline-block align-middle mr-2">
        </a>
        <ul class="nav my-4 justify-content-between">
            <?php 
                $parsedUrl = parse_url(URL::current());
                if(isset($parsedUrl['path'])) {
                    $parsedUrl_path = $parsedUrl['path'];
                    $parsedUrl = explode('/', $parsedUrl_path);
                }
            ?>
            @foreach ($pages as $title => $url)
                
                <li class="mx-4"><a class="{{ isset($parsedUrl[1]) && $parsedUrl[1] == $url ? 'text-decoration-underline' : '' }}" href="/{{ $url }}">{{ $title }}</a></li>
            @endforeach
        </ul>
        @foreach ($socials as $id => $url)
            <a href="{{ $url }}" class="px-3 social float-end" id="social_{{ $id }}">
                <i class="social_icon fa-brands fa-{{ $id }}"></i>
            </a>
        @endforeach
        <div class="vr"></div>
        <a href="{{ route('administration.homepage') }}"><img class="float-end ms-4" src="{{ asset('assets/icon_admin.png') }}" width="100%" style="max-width: 30px" /></a>

    </div>
{{--     <div class="row mx-5 w-100">
 --}}        

{{--     </div>
 --}}
</div>
