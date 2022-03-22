@extends('dashboard')

@section('slot')

<div>
    <div class="ml-4 flex mt-6">
        <img src="{{ asset('images/search.svg') }}" alt="search" class="mr-2">
        <input type="text" placeholder="Search by country" class="outline-none">
    </div>
    <div class="flex mt-6 space-x-4 bg-gray-100 text-sm font-medium">
        <div class="ml-4 ">
            Location
        </div>
        <div>
            New cases
        </div>
        <div>
            Death
        </div>
        <div>
            Recovered
        </div>
    </div>
</div>

@endsection