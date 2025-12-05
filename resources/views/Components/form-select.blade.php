@props(['name'])

<div class="flex items-center rounded-md bg-white pl-3 pr-3 py-2 outline-1 -outline-offset-1 outline-gray-300 border border-gray-300">
    <select
        name="{{ $name }}"
        id="{{ $name }}"
        {{ $attributes->merge(['class' => 'block w-full text-sm text-gray-900 bg-white']) }}
    >
        {{ $slot }}
    </select>
</div>

