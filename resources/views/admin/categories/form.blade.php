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
            <input name="title" type="text" placeholder="Title" class="border p-1 rounded"
                value="{{ $category->name ?? old('name') }}" @if(!$isNew) disabled @endif>
        </div>
        <div class="input-group">
            <strong>Set your slug:</strong>
            <input type="text" name="slug" value="{{ $category->slug ?? '' }}" style="width: 300px" @if(!$isNew)
            disabled @endif>
        </div>
</div>
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