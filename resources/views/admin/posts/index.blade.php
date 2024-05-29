@extends('admin.layout.main')

@section('content')
<div class='ml-4 mt-4 p-4'>
    <div class="flex justify-between">
        <a href="/admin/welcome"
            class="text-blue-500 hover:underline bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Back</a>
        <a href="/admin/posts/create"
            class="text-blue-500 hover:underline bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create
            Post</a>
    </div>
    @if ($posts->count() == 0)
        <p class="text-500 font-semibold text-lg text-center">No posts found</p>
    @else
        <div class="ml-4 mt-4 ">
            @foreach ($posts as $post)
                <li class='font-semibold text-gray-600 mb-2'>
                    <a href="/posts/{{ $post->id }}" class="text-blue-500 hover:underline">
                        <strong>Title: {{ $post->title }}</strong>
                    </a>
                    <p>Description: {{ $post->content }}</p>
                </li>
            @endforeach
        </div>
    @endif
</div>
@endSection