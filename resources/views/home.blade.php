<x-layout>

    <x-slot:heading> MANHWABANG </x-slot:heading>

    @foreach($manhwas as $manhwa)
    <x-manhwa-card :manhwa="$manhwa"/>
    @endforeach

</x-layout>

