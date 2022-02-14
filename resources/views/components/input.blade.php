@props(['name'])

<x-label name="{{ $name }}" />
<input class="border @error($name) border-red-500 @else border-gray-200 @enderror p-2 w-96 rounded" name="{{ $name }}" id="{{ $name }}"
    {{ $attributes(['value' => old($name)]) }}>
<x-error name="{{ $name }}" />