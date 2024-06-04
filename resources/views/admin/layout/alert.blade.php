@if ($message = Session::get('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Success!</strong>
        <span class="block sm:inline">{{ $message }}</span>
        <span x-on:click="alerts.splice(alerts.indexOf(alert), 1)"
            class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" :title="Close">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M4.143 3.547a1 1 0 00-1.414 1.414L8.646 12l-4.503 4.503a1 1 0 001.414 1.414L14.5 8.646a1 1 0 00-1.414-1.414L4.143 3.547z" />
            </svg>
        </span>
    </div>
@endif

@if ($message = Session::get('error'))
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <span class="block sm:inline">{{ $message }}</span>
        <span x-on:click="alerts.splice(alerts.indexOf(alert), 1)"
            class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" :title="Close">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M4.143 3.547a1 1 0 00-1.414 1.414L8.646 12l-4.503 4.503a1 1 0 001.414 1.414L14.5 8.646a1 1 0 00-1.414-1.414L4.143 3.547z" />
            </svg>
        </span>
    </div>
@endif


@if (count($errors) > 0)
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error!</strong>
        <ul class="list-none m-0 flex flex-col">
            @foreach ($errors->all() as $error)
                <li class="block sm:inline">{!! nl2br(e($error)) !!}</li>
            @endforeach
        </ul>
        <span x-on:click="alerts.splice(alerts.indexOf(alert), 1)"
            class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" :title="Close">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path
                    d="M4.143 3.547a1 1 0 00-1.414 1.414L8.646 12l-4.503 4.503a1 1 0 001.414 1.414L14.5 8.646a1 1 0 00-1.414-1.414L4.143 3.547z" />
            </svg>
        </span>
    </div>
@endif
