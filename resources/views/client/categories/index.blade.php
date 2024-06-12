@extends('client.layouts.app')


@section('content')
<div class="container">
    <div>
        <h1 class="text-3xl font-bold underline">Find posts in needed category</h1>
    </div>
    <div>
        <h2>List of categories:</h2>
        <ul>
            @foreach($categories as $key => $category)
                <li class="border p-1 rounded" value="{{ $key }}">
                    <a href="/posts?category={{ $key }}" class="hover:text-blue-500">
                        {{ $category }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endSection