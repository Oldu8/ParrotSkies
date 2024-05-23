<div class='ml-4 mt-6 font-semibold text-gray-600 mb-2'>
    <form action="/posts" method="POST" class="flex flex-col gap-2">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="input-group">
            <strong>Title:</strong>
            <input name="title" type="text" placeholder="Title" class="border p-1 rounded" value="{{ old('title') }}">
        </div>
        <div class="input-group">
            <strong>Description:</strong>
            <textarea rows="3" name="content" type="text" placeholder="Description" class="border p-1 rounded "
                value="{{ old('content') }}">
            </textarea>
        </div>
        <div class="input-group">
            <strong>Is Active:</strong>
            <div class="toggle-switch">
                <input type="hidden" name="active" value="0">
                <input type="checkbox" id="active" name="active" value="1">
                <label for="active" class="toggle-label">
                    <span class="toggle-inner"></span>
                    <span class="toggle-switch"></span>
                </label>
            </div>
        </div>

        <hr>
        @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <hr>
        @endif
        <input type="submit" value="Create" class="border p-1 rounded bg-blue-500 text-white ">
</div>