<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
    @stack('styles')
    @stack('scripts')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/homepage.css') }}">
</head>

<body class="d-flex flex-column min-vh-100 bg-dark opacity-90 text-white">
    <div class="container-fluid home_bg_img m-0 p-0">

        <header class="row sticky-top justify-center mx-0 mb-4">
            @include('includes.header')
        </header>

        <div id="main" class="row mx-0">
            @yield('content')
        </div>

        
    </div>
    <footer class="row text-center mt-auto mx-0 mb-2">
        @include('includes.footer')
    </footer>
</body>

</html>
