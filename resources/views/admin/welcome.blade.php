@php

    $categoriesTotal = App\Models\Category::all()->count();
    $postsTotal = App\Models\Post::all()->count();

@endphp
@extends('admin.layout.main')

@section('content')
@include('admin.layout.alert')


<div class="container flex-col items-center justify-center p-4">
    <div class="container mx-auto mt-2 px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold leading-tight mb-4">Admin panel</h2>
        <div>
            <h4 class="text-xl font-bold text-gray-600">Total posts created: {{ $postsTotal }}</h4>
            <h4 class="text-xl font-bold text-gray-600">Total categories created: {{ $categoriesTotal }}</h4>
        </div>
    </div>
</div>
@endSection