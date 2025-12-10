<x-layout>

    <x-slot:heading> MANHWABANG </x-slot:heading>

    @foreach($manhwas as $manhwa)
        <a href="/manhwa/{{ $manhwa['id'] }}">
            <x-manhwa-card :manhwa="$manhwa"/>
        </a>
    @endforeach

</x-layout>

