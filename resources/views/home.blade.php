
<x-layout :genres="$genres">

    <x-slot:heading>
        MANHWABANG
    </x-slot:heading>

    @foreach($manhwas as $manhwa)
        <h1> {{ $manhwa->title }}</h1>
    @endforeach

</x-layout>

