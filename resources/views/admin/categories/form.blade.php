@php
    $isNew = isset($category) ? false : true;
    $method = $isNew ? 'POST' : 'PATCH';
    $formAction = $isNew ? route('categories.store') : route('categories.update', $category->id);
@endphp


<div class='py-4 font-semibold text-gray-600 mb-2 '>
    <form action="{{ $formAction }}" method="POST" class="flex flex-col gap-2">
        @csrf
        @if(!$isNew)
            @method('PATCH')
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-group">
            <strong>Name:</strong>
            <input name="name" id="nameInput" type="text" placeholder="Name" class="border p-1 rounded max-w-md"
                value="{{ $category->name ?? old('name') }}" @if(!$isNew) disabled @endif>
        </div>
        <div class="input-group">
            <strong>Set your slug:</strong>
            <input name="slug" id="slugInput" type="text" placeholder="Slug" class="border p-1 rounded max-w-md"
                value="{{ $category->slug ?? '' }}" @if(!$isNew) disabled @endif>
        </div>
</div>
@if(isset($posts) && count($posts) > 0)
    <div class="pt-6 mb-2">
        <h3 class="text-gray-600 text-lg mb-2">List of posts in this category</h3>
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-800 text-white text-left">
                    <th class="p-2">ID</th>
                    <th class="p-2">Title</th>
                    <th class="p-2">Slug</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr class="{{ $loop->odd ? 'bg-gray-100' : 'bg-gray-200' }}">
                        <td class="p-2 border-b">{{ $post->id }}</td>
                        <td class="p-2 border-b">
                            <a class="hover:text-blue-500 underline"
                                href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                        </td>
                        <td class="p-2 border-b">{{ $post->slug }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
<div class="pt-6">
    @if($isNew)
        <input type="submit" value="Create" class="border p-1 rounded bg-blue-500 text-white w-1/4">
    @else
        <button type="button" id="editButton" class="border p-1 rounded bg-blue-500 text-white w-1/4">Edit</button>
        <input type="submit" value="Save" class="border p-1 rounded bg-blue-500 text-white w-1/4" style="display: none;"
            id="saveButton">
    @endif
</div>
</form>


</div>

@section('js')
<script>
    document.getElementById('editButton').addEventListener('click', function () {
        document.getElementById('editButton').style.display = 'none';
        document.getElementById('saveButton').style.display = 'block';
        document.getElementById('nameInput').disabled = false;
        document.getElementById('slugInput').disabled = false;
    });
</script>
@endsection