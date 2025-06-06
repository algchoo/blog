<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


    <!-- Scripts -->
    @php
        $manifest = json_decode(file_get_contents(public_path('build/.vite/manifest.json')), true);
    @endphp

    <link href="/build/{{ $manifest['resources/sass/app.scss']['file'] }}" rel="stylesheet">
</head>
<body>
    <header>
        @yield('header')
    </header>

    <main>
        @yield('main')
    </main>
</body>
</html>
