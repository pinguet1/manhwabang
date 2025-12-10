<x-layout>
    <x-slot:heading>
        Manhwabang
    </x-slot:heading>

    <div class="w-full max-w-sm mx-auto object-contain" >
    <img
        src="{{ asset('storage/' . $manhwa->cover_image) }}"
        alt="{{ $manhwa->title }}"
        class="w-full object-cover"
    >

    <div class="p-5">
        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $manhwa->title }}</h2>

        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
            {{ $manhwa->author }}
        </p>

        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
            {{ $manhwa->published_at }}
        </p>

        <p class="text-gray-600 text-sm mb-4 line-clamp-3">
            {{ $manhwa->description }}
        </p>
    </div>
    </div>

</x-layout>
