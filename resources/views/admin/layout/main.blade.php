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
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/admin.css">
</head>

<body>
    <div class="wrapper">
        <div class="admin_panel">
            <div class=" pb-5 flex justify-between">
                <img class="w-20" src="/img/logo.png" alt="logo parrot skies" />
                <div class="flex flex-col gap-2 text-white">
                    <p class="font-bold">{{ Auth::guard('admin')->user()->name }}</p>
                    <a class="underline" href="{{ route('admin-logout') }}">logout</a>
                </div>
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