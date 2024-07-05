@php
    $isNew = isset($post) ? false : true;
    $method = $isNew ? 'POST' : 'PATCH';
    $formAction = $isNew ? route('posts.store') : route('posts.update', $post->id);
@endphp


<div class='py-4 font-semibold text-gray-600 mb-2 '>
    <form action="{{ $formAction }}" method="POST" class="flex flex-col gap-2">
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
        <!-- Get plugin to make data for description editable -->
        <!-- <div class="input-group">
            <strong>Description:</strong>
            <textarea id="contentInput" rows=" 3" name="content" placeholder="Description" class="border p-1 rounded"
                @if(!$isNew) disabled @endif>{{ $post->content ?? old('content') }}
            </textarea>
        </div> -->
        <div class="input-group my-4">
            <strong>Description:</strong>
            <div id="quillEditor" class="bg-white border p-1 rounded min-h-[200px]" >
                {!! $post->content ?? old('content') !!}
            </div>
            <input type="hidden" name="content" id="contentInput">
        </div>
    </form>
        <div class="input-group">
            <strong>Is Active:</strong>
            <div class="toggle-switch">
                <input type="hidden" name="active" value="0">
                <input type="checkbox" id="active" name="active" value="1" 
                @if(isset($post) && $post->active) checked @endif 
                @if(!$isNew) disabled @endif
                >
                <label for="active" class="toggle-label">
                    <span class="toggle-inner"></span>
                    <span class="toggle-switch"></span>
                </label>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div class="input-group">
                <strong>Select category:</strong>
                <select id="categoryInput" name="category_id" class="border p-1 rounded" style="width: 300px"
                    @if(!$isNew) disabled @endif
                    >
                    @foreach($categories as $key => $category)
                        <option class="border p-1 rounded" value="{{ $key }}" @if(isset($post) && $post->category_id == $key)
                        selected @endif>{{ $category }}</option>
                    @endforeach
                </select>
            </div>
            <!-- TODO: make it saves img to storage -->
            <div class="input-group">
                <strong>Select an image:</strong>
                <input id="imageInput" type="text" name="thumbnail" value="{{ $post->thumbnail ?? '' }}"
                    style="width: 300px" @if(!$isNew) disabled @endif>
            </div>
            <div class="input-group">
                <strong>Set your slug:</strong>
                <input id="slugInput" type="text" name="slug" value="{{ $post->slug ?? '' }}" style="width: 300px" @if(!$isNew)
                disabled @endif>
            </div>
            <!-- TODO: make this data sets as in DB -->
            <div class="input-group">
                <strong>Select time of publishing:</strong>
                <!-- <input type="datetime-local" name="published_at" style="width: 300px"> -->
                <input id="publishedInput" type="datetime-local" name="published_at"
                    value="{{ isset($post) ? $post->published_at : '' }}" style="width: 300px" @if(!$isNew) disabled
                    @endif>

            </div>
        </div>
        <div class="pt-6">
            @if($isNew)
                <input type="submit" value="Create" class="border p-1 rounded bg-blue-500 text-white w-1/4">
            @else
                <button type="button" id="editButton" class="border p-1 rounded bg-blue-500 text-white w-1/4">Edit</button>
                <input type="submit" value="Save" class="border p-1 rounded bg-blue-500 text-white w-1/4"
                    style="display: none;" id="saveButton">
            @endif
        </div>
    </form>
</div>

@section('js')
<script>
      const quill = new Quill('#quillEditor', {
        modules: { toolbar: true },
        placeholder: 'Description',
        readOnly: true,
    theme: 'snow'
  });
  
    const editButton = document.getElementById('editButton');
    const saveButton = document.getElementById('saveButton');
    editButton.addEventListener('click', () => {
        editButton.style.display = 'none';
        saveButton.style.display = 'block';
        document.getElementById('titleInput').disabled = false;
        document.getElementById('contentInput').disabled = false;
        document.getElementById('categoryInput').disabled = false;
        document.getElementById('imageInput').disabled = false;
        document.getElementById('slugInput').disabled = false;
        document.getElementById('publishedInput').disabled = false;
    })
</script>
@endSection