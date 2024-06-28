@extends('client.layouts.app')
@section('title', $post->title) 

@section('content')
<div class="container mx-auto mt-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-8 rounded-lg shadow-lg flex flex-col justify-between gap-4  mb-8">
        <h1 class="text-5xl font-bold text-left text-gray-900">{{ $post->title }}</h1>
        <p class="text-md text-gray-900">{{ $post->published_at }}</p>
        <div class="mb-4 w-full max-w-md ">
            <img src="{{ $post->thumbnail }}" alt="image" />
        </div>
    </div>
    <div class=" p-8">
        <p class="text-lg text-gray-900">{!! $post->content !!}</p>
    </div>
</div>
@endsection