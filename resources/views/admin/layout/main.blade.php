<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        Admin PS
    </title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
    <div class="wrapper">
        <div class="admin_panel">
            <div class="w-20 mx-auto pb-5">
                <img src="/img/logo.png" alt="logo parrot skies" />
            </div>
            <div class="flex justify-between">
                <a href="{{ route('client.home') }}" class="admin_swap">Client</a>
                <a href="{{ route('admin.welcome') }}" class="admin_swap">Admin</a>
            </div>
            <div class="flex justify-between flex-col pt-5">
                <!-- <a href="{{ route('admin.welcome') }}" class="admin_link">Home</a> -->
                <a href="/admin/posts" class="admin_link"> Posts</a>
                <a href="/admin/categories" class="admin_link">Categories</a>
            </div>
        </div>
        <div class="content">
            @yield('content')
        </div>
    </div>
    @yield('js')
</body>

</html>