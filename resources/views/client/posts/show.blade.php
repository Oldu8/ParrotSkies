@extends('client.layouts.app')

@section('content')
<div class="container mx-auto mt-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-5xl font-bold mb-8 text-center text-gray-900">{{ $post->title }}</h1>
    </div>
</div>
@endsection