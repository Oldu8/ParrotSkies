@extends('admin.layout.main')

@section('content')
<div class='ml-4 mt-4'>
    @if ($categories->count() == 0)
        <p class="text-500 font-semibold text-lg text-center">No categories found</p>
    @else
        @foreach ($categories as $category)
            <li class='font-semibold text-gray-600 mb-2'>
                <a href="/posts/{{ $category->id }}" class="text-blue-500 hover:underline">
                    <strong>Title: {{ $category->title }}</strong>
                </a>
            </li>
        @endforeach
    @endif
</div>
@endSection