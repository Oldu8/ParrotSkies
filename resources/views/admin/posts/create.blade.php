@extends('admin.layout.main')
@section('content')

<!--    'title',
        'content',
        'active',
        'thumbnail',
        'category_id',
        'slug',
        'published_at', 
    -->
<div class="container">
    @include('admin.posts.form')
</div>
@endSection