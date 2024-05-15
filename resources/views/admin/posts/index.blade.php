@extends('admin.layout.main')

<div class='ml-4 mt-4'>
    @if ($posts->count() == 0)
        <p class="text-500 font-semibold text-lg text-center">No posts found</p>
    @else
        @foreach ($posts as $post)
            <li class='font-semibold text-gray-600 mb-2'>
                <a href="/posts/{{ $post->id }}" class="text-blue-500 hover:underline">
                    <strong>Title: {{ $post->title }}</strong>
                </a>
                <p>Description: {{ $post->description }}</p>
            </li>
        @endforeach
    @endif
</div>