<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Parrot Skies') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Scripts -->
    @vite(['resources/js/app.js'])
</head>
<body>
    <div id="app">
        <div class="container mx-auto flex flex-col min-h-screen justify-between">
            @include('layouts.header')
        <div class="py-2">
            @yield('content')
        </div>
        <footer class="py-2 flex justify-between">
            <p>© 2024 Parrot Skies. All rights reserved.</p>
            <p>Made by Oldu</p>
        </footer>
    </div>
    </div>
</body>
</html>
