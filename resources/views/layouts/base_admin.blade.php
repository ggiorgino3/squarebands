<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head_admin')
    @stack('styles')
</head>

<body>

    <div class="row" id="body-row">
        <!-- MAIN -->
        @include('includes.sidebar')

        <div class="col p-4 scrollbar_of">

            <div id="main">

                @yield('content')

            </div>

        </div><!-- Main Col END -->

    </div><!-- body-row END -->

    <footer class="row text-center fixed-bottom">
        @include('includes.footer')
    </footer>
</body>

</html>
