@props(['name'])

<label class="block mb-2 font-bold text-lg text-black mt-6" for="{{ $name }}">
    @if ($name === 'password_confirmation')
        {{ $name = 'Repeat Password' }}
    @else
        {{ ucfirst($name) }}
    @endif
</label>