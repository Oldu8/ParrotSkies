@extends('client.layouts.app')

@section('content')
<div class="container mx-auto mt-12 px-4 sm:px-6 lg:px-8">
    <!-- Hero Section -->
    <div class="bg-cover bg-center h-64 mb-8" style="background-image: url('/path/to/your/hero/image.jpg');">
        <div class="flex items-center justify-center h-full bg-black bg-opacity-50">
            <h1 class="text-white text-4xl font-bold">Welcome to Parrot Skies</h1>
        </div>
    </div>

    <!-- Introduction Section -->
    <div class="bg-white p-8 rounded-lg shadow-lg mb-8">
        <h2 class="text-2xl font-bold mb-4">About Parrot Skies</h2>
        <p class="text-gray-700">Parrot Skies is a volunteer project that aims to help people around the world with
            their parrots. Our goal is to make information about traveling with pets and especially with parrots
            accessible to most travelers. We try to make immigration and traveling with birds more understandable and
            possible, to prevent people from leaving their pets. We hope you can find all necessary information on this
            website or in our small group.</p>
    </div>
    <!-- Categories Section -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Explore Categories</h2>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($categories as $category)
                <div class="bg-white p-4 rounded-lg shadow-lg text-center">
                    <h3 class="text-xl font-bold">{{ $category->name }}</h3>
                    <a href="{{ route('categories.show', $category->id) }}"
                        class="text-blue-500 mt-2 inline-block">Explore</a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Recent Posts Section -->
    <div class="mb-8">
        <h2 class="text-2xl font-bold mb-4">Recent Posts</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($recentPosts as $post)
                <div class="bg-white p-4 rounded-lg shadow-lg">
                    <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : asset('img/basic_post_img.jpg') }}"
                        alt="{{ $post->title }}" class="w-full h-48 object-cover rounded-t-lg">
                    <div class="p-4">
                        <h3 class="text-xl font-bold">{{ $post->title }}</h3>
                        <a href="{{ route('client.post.show', $post->slug) }}" class="text-blue-500 mt-2 inline-block">Read
                            More</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


</div>
@endsection