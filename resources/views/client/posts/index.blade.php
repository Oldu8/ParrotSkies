@extends('client.layouts.app')

@section('content')
<div class="container mx-auto mt-12 px-4 sm:px-6 lg:px-8">
    <div class="bg-white p-8 rounded-lg shadow-lg">
        <h1 class="text-5xl font-bold mb-8 text-center text-gray-900">All posts</h1>

        <!-- Filter Form -->
        <div class="mb-8 flex justify-center">
            <form method="GET" action="{{ route('client.all-posts') }}"
                class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-4 sm:space-y-0 sm:space-x-4 bg-gray-100 p-4 rounded-lg shadow-sm w-full max-w-md sm:max-w-none">
                <label for="category" class="text-lg font-semibold text-gray-700 sm:flex-shrink-0 sm:self-center">
                    Filter by Category:
                </label>
                <select name="category" id="category"
                    class="block w-full sm:w-64 p-2 border border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500">
                    <option value="">All Categories</option>
                    @foreach($categories as $key => $category)
                        <option value="{{ $key }}" {{ request('category') == $key ? 'selected' : '' }}>
                            {{ $category }}
                        </option>
                    @endforeach
                </select>
                <button type="submit"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition duration-200">
                    Filter
                </button>
            </form>
        </div>


        <div>
            <h2 class="text-3xl font-semibold text-gray-800 mb-6">All our recent posts:</h2>
            <ul class="space-y-4">
                @foreach($posts as $post)
                    <li class="bg-gray-50 p-4 rounded-lg shadow hover:bg-gray-100 transition duration-200">
                        <a href="{{ route('client.post.show', $post->slug) }}"
                            class="block font-semibold text-xl text-blue-600 hover:text-blue-700 transition duration-200">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <!-- Pagination Links -->
            <div class="mt-8 flex justify-center gap-4">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>
@endsection