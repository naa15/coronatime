<div class="">
    <div class="border-2 flex mt-6 px-4 py-1.5 rounded-xl w-60 ml-4">
        <img src="{{ asset('images/search.svg') }}" alt="search" class="mr-2">
        <input wire:model="search" type="text" placeholder="{{ __('messages.search_by_country') }}" class="outline-none w-full">
    </div>

    <div class="grid grid-cols-4 mt-6 border-2 md:rounded-2xl md:mr-4 md:ml-4">
        <div class="bg-gray-100 text-sm font-semibold md:rounded-tl-2xl h-14 flex items-center">
            <p class="md:ml-10 ml-4">
                {{ __('messages.location') }}
            </p>
            <div wire:model="filter" class="ml-1">
                <a href="{{ route('countries', ['filter' => 'location', 'order' => 'desc']) }}">
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="currentColor"
                        class="@if ($filter === 'location' && $order === 'desc') text-black @else text-gray-300 @endif">
                        <path d="M5 0.5L10 5.5L1.43051e-06 5.5L5 0.5Z" />
                    </svg>
                </a>
                <a href="{{ route('countries', ['filter' => 'location', 'order' => 'asc']) }}">
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="currentColor"
                        class="@if ($filter === 'location' && $order === 'asc') text-black @else text-gray-300 @endif">
                        <path d="M5 5.5L1.90735e-06 0.5H10L5 5.5Z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="bg-gray-100 text-sm font-semibold h-14 flex items-center">
            <p class="ml-6">
                {{ __('messages.new_cases') }}
            </p>
            <div wire:model="filter" class="ml-1 md:mr-0 mr-5">
                <a href="{{ route('countries', ['filter' => 'confirmed', 'order' => 'desc']) }}">
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="currentColor"
                        class="@if ($filter === 'confirmed' && $order === 'desc') text-black @else text-gray-300 @endif">
                        <path d="M5 0.5L10 5.5L1.43051e-06 5.5L5 0.5Z" />
                    </svg>
                </a>
                <a href="{{ route('countries', ['filter' => 'confirmed', 'order' => 'asc']) }}">
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="currentColor"
                        class="@if ($filter === 'confirmed' && $order === 'asc') text-black @else text-gray-300 @endif">
                        <path d="M5 5.5L1.90735e-06 0.5H10L5 5.5Z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="bg-gray-100 text-sm font-semibold h-14 flex items-center">
            {{ __('messages.death') }}
            <div wire:model="filter" class="ml-1">
                <a href="{{ route('countries', ['filter' => 'deaths', 'order' => 'desc']) }}">
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="currentColor"
                        class="@if ($filter === 'deaths' && $order === 'desc') text-black @else text-gray-300 @endif">
                        <path d="M5 0.5L10 5.5L1.43051e-06 5.5L5 0.5Z" />
                    </svg>
                </a>
                <a href="{{ route('countries', ['filter' => 'deaths', 'order' => 'asc']) }}">
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="currentColor"
                        class="@if ($filter === 'deaths' && $order === 'asc') text-black @else text-gray-300 @endif">
                        <path d="M5 5.5L1.90735e-06 0.5H10L5 5.5Z" />
                    </svg>
                </a>
            </div>
        </div>
        <div class="bg-gray-100 text-sm font-semibold md:rounded-tr-2xl h-14 flex items-center">
            {{ __('messages.recovered') }}
            <div wire:model="filter" class="ml-1">
                <a href="{{ route('countries', ['filter' => 'recovered', 'order' => 'desc']) }}">
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="currentColor"
                        class="@if ($filter === 'recovered' && $order === 'desc') text-black @else text-gray-300 @endif">
                        <path d="M5 0.5L10 5.5L1.43051e-06 5.5L5 0.5Z" />
                    </svg>
                </a>
                <a href="{{ route('countries', ['filter' => 'recovered', 'order' => 'asc']) }}">
                    <svg width="10" height="6" viewBox="0 0 10 6" fill="currentColor"
                        class="@if ($filter === 'recovered' && $order === 'asc') text-black @else text-gray-300 @endif">
                        <path d="M5 5.5L1.90735e-06 0.5H10L5 5.5Z" />
                    </svg>
                </a>
            </div>
        </div>

        @foreach ($countries as $country)
            @if ($country->code != 'WRLD')
                <div class="h-14 flex items-center ml-4 md:ml-10">
                    {{ $country->name }}
                </div>
                <div class="h-14 flex items-center ml-6">
                    {{ $country->confirmed }}
                </div>
                <div class="h-14 flex items-center">
                    {{ $country->deaths }}
                </div>
                <div class="h-14 flex items-center">
                    {{ $country->recovered }}
                </div>
            @endif
        @endforeach
    </div>
</div>

