<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Parrot Skies</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/client.css">

    <!-- SEO Meta Tags -->
    @yield('meta')

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('fav.png') }}">

</head>

<body>
    <div id="app">
        <div class="container mx-auto flex flex-col min-h-screen justify-start">
            @include('client.layouts.header')
            <div class="py-2">
                @yield('content')
            </div>
            <footer class="py-2 px-4 flex justify-between mt-auto">
                <p>© 2024 Parrot Skies. All rights reserved.</p>
                <p>Made by Oldu</p>
            </footer>
        </div>
    </div>
</body>

</html>