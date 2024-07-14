<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | Admin|PS </title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="/css/admin.css">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="w-full max-w-md">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-bold mb-4">Login</h1>
            @if(Session::has('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif
            <form action="{{ route('admin-login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-bold mb-2">Email address</label>
                    <input type="email" name="email"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="email" placeholder="name@example.com" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-bold mb-2">Password</label>
                    <input type="password" name="password"
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Login
                    </button>
                </div>
            </form>
            <!-- <div class="mt-4 text-center ">
                <a class="text-blue-500 hover:underline " href="">Create an account</a>
            </div> -->
        </div>
    </div>
</body>

</html>