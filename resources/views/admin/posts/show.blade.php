@extends('admin.layout.main')
@section('content')

<div class="container">
    <div class='ml-4 mt-4 p-4'>
        <div class="flex justify-between">
            <button onclick="history.back()"
                class="text-white hover:underline bg-blue-500 text-white font-bold py-2 px-4 rounded">
                Back
            </button>
        </div>
        @include('admin.posts.form')
    </div>
</div>
@endSection