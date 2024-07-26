@extends('client.layouts.app')
@section('title', $post->title) 


@section('meta')
<meta name="description"
    content="{{ $post->meta_description ?? 'Discover tips, experiences, and advice on traveling with parrots and pets. Join our community to find pet-friendly destinations, accommodations, and more to make your adventures with your furry and feathered friends unforgettable.' }}">
<meta name="keywords"
    content="{{ $post->meta_keywords ?? 'traveling with pets, traveling with parrots, pet travel tips, pet-friendly destinations, pet-friendly accommodations, animal travel, parrot travel tips, pet travel forum, travel with animals, travel community' }}">
<meta name="author" content="Parrot Skies">
@endsection


@section('content')
<div class="container mx-auto mt-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-8 rounded-lg shadow-lg flex flex-col justify-between gap-4  mb-8">
        <h1 class="text-5xl font-bold text-left text-gray-900">{{ $post->title }}</h1>
        <p class="text-md text-gray-900">{{ $post->formatted_published_at }}</p>
        <div class="mb-4 w-full max-w-md ">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="post image">
        </div>
    </div>
    <div class=" p-8 htmlSection">
        {!! $post->content !!}
    </div>
</div>
@endsection