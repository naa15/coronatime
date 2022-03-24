@extends('dashboard')

@section('slot')

<div class="">
    <div class="border-2 flex mt-6 px-4 py-1.5 rounded-xl w-60 ml-4">
        <img src="{{ asset('images/search.svg') }}" alt="search" class="mr-2">
        <input type="text" placeholder="Search by country" class="outline-none w-full">
    </div>

    <div class="grid grid-cols-4 mt-6 border-2 md:rounded-2xl md:mr-4 md:ml-4">
        <div class="bg-gray-100 text-sm font-medium md:rounded-tl-2xl h-14 flex items-center">
            <p class="md:ml-10 ml-4">Location</p>
        </div>
        <div class="bg-gray-100 text-sm font-medium h-14 flex items-center">
            <p class="ml-6 mr-2">New cases</p>
        </div>
        <div class="bg-gray-100 text-sm font-medium h-14 flex items-center">
            Death
        </div>
        <div class="bg-gray-100 text-sm font-medium md:rounded-tr-2xl h-14 flex items-center">
            Recovered
        </div>

        @foreach ($countries as $country)
            @if($country->code != 'WRLD')
            <div class="h-14 flex items-center ml-4 md:ml-10">
                {{ $country->name }}
            </div>
            <div class="h-14 flex items-center ml-6">
                {{ $country->confirmed }}
            </div>
            <div class="h-14 flex items-center">
                {{ $country->recovered }}
            </div>
            <div class="h-14 flex items-center">
                {{ $country->deaths }}
            </div>
            @endif
        @endforeach
    </div>
</div>

@endsection