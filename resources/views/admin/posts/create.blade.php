@php
    //dd($categories);
@endphp
@extends('admin.layout.main')
@section('content')
@include('admin.layout.alert')

<div class="container">
    <div class='ml-4 mt-4 p-4'>
        <div class="flex justify-between">
            <a href="/admin/welcome"
                class="text-blue-500 hover:underline bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Back</a>
        </div>
        @include('admin.posts.form')
    </div>
</div>
@endSection