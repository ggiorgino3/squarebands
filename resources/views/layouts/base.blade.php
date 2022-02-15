<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head')
    @stack('styles')
    <link type="text/css" rel="stylesheet" href="{{ asset('css/homepage.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container">

        <header class="row">
            @include('includes.header')
        </header>

        <div id="main" class="row">
            @yield('content')
        </div>

        
    </div>
    <footer class="row text-center mt-auto mb-2">
        @include('includes.footer')
    </footer>
</body>

</html>
