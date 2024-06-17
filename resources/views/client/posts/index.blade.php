@extends('client.layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-4xl font-bold mb-6 text-center text-gray-800">All posts</h1>
        <!-- <div class="mb-4">
            <h2 class="text-2xl font-semibold text-gray-700">List of categories:</h2>
            <ul class="mt-4">
                @foreach($categories as $key => $category)
                    <li class="mb-2">
                        <a href="/posts?category={{ $key }}"
                            class="block underline font-semibold text-lg p-3 rounded hover:bg-gray-100 hover:text-blue-500 transition duration-200">
                            {{ $category }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div> -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-700">All our recent posts:</h2>
            <ul class="mt-4">
                @foreach($posts as $post)
                    <li class="mb-2">
                        <a href="/posts?category={{ $post->slug }}"
                            class="block underline font-semibold text-lg p-3 rounded hover:bg-gray-100 hover:text-blue-500 transition duration-200">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection