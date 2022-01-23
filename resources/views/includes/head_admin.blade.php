<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

<!-- Styles -->
<link type="text/css" rel="stylesheet" href="{{ mix('css/app.css') }}">
<link type="text/css" rel="stylesheet" href="{{ asset('css/sidebar_admin.css') }}">
<style>
    body {
        font-family: 'Nunito', sans-serif;
    }
</style>

<title>{{ config('app.name', 'Laravel') }} - Admin Dashboard</title>
