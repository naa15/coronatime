@props(['name'])

@error($name)
    <div class="flex mt-1">
        <img class="mr-1" src="{{ asset('images/error.svg') }}" alt="error">
        <p class="text-red-500 text-xs mt-1"> {{ $message }}</p>
    </div>
@enderror