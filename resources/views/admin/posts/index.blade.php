@php
    $tableColumns = ['id' => 'ID', 'title' => 'Title', 'category_id' => 'Category', 'slug' => 'Slug', 'active' => 'Status', 'published_at' => 'Published At'];
@endphp
@extends('admin.layout.main')

@section('content')
@include('admin.layout.alert')

<div class='p-4'>
    <div class="flex justify-between">
        <button onclick="history.back()"
            class="text-white hover:underline bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Back
        </button>
        <a href="/admin/posts/create"
            class="text-white hover:underline bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Create Post
        </a>
    </div>
    @if ($posts->count() == 0)
        <p class="text-500 font-semibold text-lg text-center">No posts found</p>
    @else
        <div class="container mx-auto mt-2 px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold leading-tight mb-4">Posts</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr class="bg-gray-800 text-white text-left uppercase tracking-wider">
                            @foreach($tableColumns as $field => $display)
                                <th class="px-2 sm:px-4 py-3 border-b-2 border-gray-300 text-xs leading-4">
                                    <a href="{{ request()->fullUrlWithQuery(['sort' => $field, 'order' => request('order') == 'asc' ? 'desc' : 'asc']) }}"
                                        class="flex items-center">
                                        {{ $display }}
                                        @if(request('sort') == $field)
                                            @if(request('order') == 'asc')
                                                @include('admin.layout.icons.asc-arrow')
                                            @else
                                                @include('admin.layout.icons.dsc-arrow')
                                            @endif
                                        @endif
                                    </a>
                                </th>
                            @endforeach
                            <th class="px-2 sm:px-4 py-3 border-b-2 border-gray-300 text-xs leading-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($posts as $post)
                            <tr class="{{ $loop->odd ? 'bg-gray-100' : 'bg-gray-200' }}">
                                <td class="px-2 sm:px-4 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $post->id }}
                                </td>
                                <td class="px-2 sm:px-4 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $post->title }}
                                </td>
                                <td class="px-2 sm:px-4 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $post->category->name }}
                                </td>
                                <td class="px-2 sm:px-4 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $post->slug }}
                                </td>
                                <td class="px-2 sm:px-4 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    <div class="toggle-switch">
                                        @csrf
                                        <input type="hidden" name="active" value="0">
                                        <input type="checkbox" id="toggle-active-{{ $post->id }}" name="active" value="1"
                                            data-route="{{ route('posts.toggle-active', ['post' => $post->id]) }}"
                                            @if($post->active) checked @endif>
                                        <label for="toggle-active-{{ $post->id }}" class="toggle-label">
                                            <span class="toggle-inner"></span>
                                            <span class="toggle-switch"></span>
                                        </label>
                                    </div>
                                </td>
                                <td class="px-2 sm:px-4 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $post->published_at }}
                                </td>
                                <td
                                    class="px-2 sm:px-4 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900 space-x-1 sm:space-x-2">
                                    <a href="{{ route('posts.edit', $post->id) }}"
                                        class="leading-4 text-sm text-white bg-green-500 hover:bg-green-600 py-1 px-2 sm:py-2 sm:px-4 rounded">
                                        Edit
                                    </a>
                                    <a href="{{ route('client.post.show', $post->slug) }}" target="_blank"
                                        class="leading-4 text-sm text-white bg-violet-500 hover:bg-violet-600 py-1 px-2 sm:py-2 sm:px-4 rounded">
                                        View
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="leading-4 text-sm text-white bg-red-500 hover:bg-red-600 py-1 px-2 sm:py-2 sm:px-4 rounded">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        </div>
    @endif
</div>
@endsection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-switch input[type="checkbox"]').forEach(function (toggle) {
            toggle.addEventListener('change', function () {
                let route = this.dataset.route;
                let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                let activeStatus = this.checked ? 'true' : 'false';

                fetch(route, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        active: activeStatus
                    })
                })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        console.log('Success:', data);
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                        alert('An error occurred: ' + error.message);
                    });
            });
        });
    });
</script>

@endsection