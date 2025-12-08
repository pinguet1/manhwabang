@props(['manhwa'])

<div class="max-w-sm bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
    <img
        src="{{ asset('storage/' . $manhwa->cover_image) }}"
        alt="{{ $manhwa->title }}"
        class="w-full h-64 object-cover"
    >

    <div class="p-5">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $manhwa->title }}</h2>

        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
            {{ $manhwa->description }}
        </p>

        <div class="flex flex-wrap gap-2">
            @foreach($manhwa->genres as $genre)
                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">
                    {{ $genre->name }}
                </span>
            @endforeach
        </div>
    </div>
</div>
