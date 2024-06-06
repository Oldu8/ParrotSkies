@extends('admin.layout.main')

@section('content')
@include('admin.layout.alert')

<div class='p-4'>
    <div class="flex justify-between">
        <button onclick="history.back()"
            class="text-white hover:underline bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Back
        </button>
        <a href="/admin/categories/create"
            class="text-white hover:underline bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Create Category
        </a>
    </div>
    @if ($categories->count() == 0)
        <p class="text-500 font-semibold text-lg text-center">No categories found</p>
    @else
        <div class="container mx-auto mt-2 px-4 sm:px-6 lg:px-8">
            <h2 class="text-2xl font-semibold leading-tight mb-4">Categories</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 text-gray-600 uppercase ">
                                ID</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 text-gray-600 uppercase ">
                                Name</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 text-gray-600 uppercase ">
                                Slug</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 text-gray-600 uppercase ">
                                Amount of posts</th>
                            <th
                                class="px-6 py-3 border-b-2 border-gray-300 bg-gray-50 text-left text-xs leading-4 text-gray-600 uppercase ">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($categories as $category)
                            <tr>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $category->id }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $category->name }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $category->slug }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900">
                                    {{ $category->posts_count }}
                                </td>
                                <td class="px-6 py-4 border-b border-gray-300 text-sm leading-5 text-gray-900 space-x-2">
                                    <a href="{{ route('categories.edit', $category->id) }}"
                                        class="leading-4 text-sm  text-white bg-green-500 hover:underline py-2 px-4 rounded">
                                        Edit
                                    </a>
                                    <a href="{{ route('categories.show', $category->id) }}"
                                        class="leading-4 text-sm text-white bg-violet-500 hover:underline py-2 px-4 rounded">
                                        View
                                    </a>
                                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                        class="inline-block">
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