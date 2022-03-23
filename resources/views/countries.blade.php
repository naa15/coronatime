@extends('dashboard')

@section('slot')

<div class="ml-4">
    <div class="border-2 flex mt-6 px-4 py-1.5 rounded-xl w-60">
        <img src="{{ asset('images/search.svg') }}" alt="search" class="mr-2">
        <input type="text" placeholder="Search by country" class="outline-none w-full">
    </div>
    <div class="grid grid-cols-4 mt-6 border-2 rounded-2xl">
        <div class="bg-gray-100 text-sm font-medium rounded-tl-2xl h-14 flex items-center">
            <p class="ml-10">Location</p>
        </div>
        <div class="bg-gray-100 text-sm font-medium h-14 flex items-center">
            New cases
        </div>
        <div class="bg-gray-100 text-sm font-medium h-14 flex items-center">
            Death
        </div>
        <div class="bg-gray-100 text-sm font-medium rounded-tr-2xl h-14 flex items-center">
            Recovered
        </div>

        <div class="h-14 flex items-center ml-10">
            erti
        </div>
        <div class="h-14 flex items-center">
            ori
        </div>
        <div class="h-14 flex items-center">
            sami
        </div>
        <div class="h-14 flex items-center">
            otxi
        </div>
        <div class="h-14 flex items-center ml-10">
            xuti
        </div>
    </div>
    <div class="grid grid-cols-4 md:grid-cols-5">
        
    </div>
</div>

@endsection