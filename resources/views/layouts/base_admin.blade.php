<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('includes.head_admin')
</head>

<body>

    {{--      
        <header class="row">
            @include('includes.header')
        </header> 
    --}}
        
    @include('includes.sidebar')


        
    <footer class="row text-center fixed-bottom">
        @include('includes.footer')
    </footer>
</body>

</html>
