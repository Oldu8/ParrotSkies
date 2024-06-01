@extends('admin.layout.main')

@section('content')
<div class='p-4'>
    <div class="flex justify-between">
        <a href="/admin/welcome" class="text-white hover:underline bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Back</a>
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
                        <tr>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 text-gray-600 uppercase tracking-wider">
                                ID</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 text-gray-600 uppercase tracking-wider">
                                Title</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 text-gray-600 uppercase tracking-wider">
                                Category</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 text-gray-600 uppercase tracking-wider">
                                Slug</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 text-gray-600 uppercase tracking-wider">
                                Status</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 text-gray-600 uppercase tracking-wider">
                                Published At</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 text-gray-600 uppercase tracking-wider">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($posts as $post)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $post->id }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $post->title }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $post->category->name }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $post->slug }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
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
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $post->published_at }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900 flex space-x-2">
                                    <a href="{{ route('posts.show', $post->id) }}"
                                        class="leading-4 text-sm text-white bg-green-500 hover:underline py-2 px-4 rounded">
                                        Show
                                    </a>
                                    <a href="{{ route('posts.show', $post->id) }}"
                                        class="leading-4 text-sm text-white bg-violet-500 hover:underline py-2 px-4 rounded">
                                        View
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="leading-4 text-sm text-white bg-red-500 hover:underline py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endSection

@section('js')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.toggle-switch input[type="checkbox"]').forEach(function (toggle) {
            toggle.addEventListener('change', function () {
                let route = this.dataset.route;
                let csrfToken = document.querySelector('input[name="_token"]').value;

                console.log(csrfToken)
                fetch(route, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                    },
                    body: JSON.stringify({
                        active: this.checked ? 1 : 0
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Success:', data);
                    })
                    .catch((error) => {
                        console.error('Error:', error);
                    });
            });
        });
    });
</script>

@endSection