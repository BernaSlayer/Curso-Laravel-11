<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="px-6 py-4">
        <h1 class="text-2xl font-bold text-gray-800">{{ $slot }}</h1>
        @if (isset($header))
            <h1 class="text-xl mt-4">{{ $header }}</h1>
        @endif

        @foreach ($posts as $p)
            <div class="card card-white mt-2 p-4 border border-gray-200 rounded-lg">
                <h3 class="text-lg font-semibold">{{ $p->title }}</h3>
                <a href="{{ route('blog.show', $p->id) }}" class="text-blue-600 hover:text-blue-800">Ir</a>
                <p class="mt-2 text-gray-600">{{ $p->description }}</p>
            </div>
        @endforeach

        @isset($extra)
            <h1 class="text-xl mt-4">{{ $extra }}</h1>
        @endisset

        <h1 class="text-xl mt-4">{{ $footer }}</h1>
    </div>
</div>