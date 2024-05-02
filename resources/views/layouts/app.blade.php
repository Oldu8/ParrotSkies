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
        <header class="flex justify-between">
            <div>Logo</div>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <a href="/" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Home</a>
                <a href="/my_story" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">My story</a>
                <a href="/categories" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Post by category</a>
                <a href="/users_stories" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Users Stories</a>
            </nav>
        </header>
        <div>
            @yield('content')
        </div>
        <footer>
            <p>Made by Oldu</p>
        </footer>
    </div>
</body>
</html>
