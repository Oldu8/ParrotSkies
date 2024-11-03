@php
    $isNew = !isset($post);
    $formAction = $isNew ? route('posts.store') : route('posts.update', $post->id);
@endphp

<div class="py-4 font-semibold text-gray-600 mb-2">
    <form action="{{ $formAction }}" method="POST" class="flex flex-col gap-2" enctype="multipart/form-data">
        @csrf
        @if(!$isNew)
            @method('PATCH')
        @endif
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-group">
            <strong>Title:</strong>
            <input name="title" type="text" placeholder="Title" id="titleInput" class="border p-1 rounded"
                value="{{ $post->title ?? old('title') }}" @if(!$isNew) disabled @endif>
        </div>
        <div class="input-group my-4">
            <strong>Description:</strong>
            <div id="quillEditor" class="bg-white border p-1 rounded min-h-[200px]">
                {!! $post->content ?? old('content') !!}
            </div>
            <input type="hidden" name="content" id="contentInput" value="{!! $post->content ?? old('content') !!}">
        </div>
        <div class="input-group">
            <strong>Is Active:</strong>
            <div class="toggle-switch">
                @csrf
                <input type="hidden" name="active" value="0">
                <input type="checkbox" id="toggle-active-{{ $post->id }}" name="active" value="1"
                    data-route="{{ route('posts.toggle-active', ['post' => $post->id]) }}" @if($post->active) checked
                    @endif>
                <label for="toggle-active-{{ $post->id }}" class="toggle-label">
                    <span class="toggle-inner"></span>
                    <span class="toggle-switch"></span>
                </label>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="input-group">
                <strong>Select category:</strong>
                <select id="categoryInput" name="category_id" class="border p-1 rounded" style="width: 300px"
                    @if(!$isNew) disabled @endif>
                    @foreach($categories as $key => $category)
                        <option class="border p-1 rounded" value="{{ $key }}" @if(isset($post) && $post->category_id == $key)
                        selected @endif>{{ $category }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group">
                <strong>Select an image:</strong>
                <input id="imageInput" type="file" name="thumbnail" style="width: 300px" @if(!$isNew) disabled @endif>
                @if(!$isNew && $post->thumbnail)
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="post image" class="w-24 h-24">
                @endif
            </div>
            <div class="input-group">
                <strong>Set your slug:</strong>
                <input id="slugInput" type="text" name="slug" value="{{ $post->slug ?? '' }}" style="width: 300px"
                    @if(!$isNew) disabled @endif>
            </div>
            <div class="input-group">
                <strong>Select time of publishing:</strong>
                <input id="publishedInput" type="datetime-local" name="published_at"
                    value="{{ isset($post) ? $post->published_at : '' }}" style="width: 300px" @if(!$isNew) disabled
                    @endif>
            </div>
        </div>
        <div class="pt-6">
            @if($isNew)
                <input type="submit" value="Create" class="border p-1 rounded bg-blue-500 text-white w-1/4 cursor-pointer">
            @else
                <button type="button" id="editButton"
                    class="border p-1 rounded bg-blue-500 text-white w-1/4 cursor-pointer hover:shadow-md">Edit</button>
                <input type="submit" value="Save"
                    class="border p-1 rounded bg-blue-500 text-white w-1/4 cursor-pointer hover:shadow-md"
                    style="display: none;" id="saveButton">
            @endif
        </div>
    </form>
</div>

@section('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    const quill = new Quill('#quillEditor', {
        modules: { toolbar: true },
        placeholder: 'Description',
        theme: 'snow',
        readOnly: {{ $isNew ? 'false' : 'true' }}
    });

    const contentInput = document.getElementById('contentInput');
    if (contentInput.value) {
        quill.root.innerHTML = contentInput.value;
    }

    quill.on('text-change', function () {
        contentInput.value = quill.root.innerHTML;
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', function () {
        contentInput.value = quill.root.innerHTML;
    });


    const editButton = document.getElementById('editButton');
    const saveButton = document.getElementById('saveButton');
    if (editButton) {
        editButton.addEventListener('click', () => {
            editButton.style.display = 'none';
            saveButton.style.display = 'block';
            document.getElementById('titleInput').disabled = false;
            quill.enable();
            document.getElementById('categoryInput').disabled = false;
            document.getElementById('imageInput').disabled = false;
            document.getElementById('slugInput').disabled = false;
            document.getElementById('publishedInput').disabled = false;
        });
    }

</script>

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