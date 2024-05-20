<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    {{-- Base Meta Tags --}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>
        Admin
    </title>


    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="/css/admin_custom.css">
</head>

<body class="@yield('classes_body')">

    <div>
        <p>Home</p>
        <p>All Posts</p>
        <p>Create Post</p>
    </div>
    {{-- Body Content --}}
    <!-- @yield('body') -->

</body>

</html>