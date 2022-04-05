@extends('dashboard')

@section('slot')

{{-- @dd(app()->currentLocale()) --}}
<div class="ml-4 md:flex space-y-4 md:space-y-0 md:mt-10">
    <div class="md:w-1/3 md:h-64 bg-blue-500 bg-opacity-10 flex flex-col h-48 items-center justify-center mr-4 rounded-2xl space-y-4">
        <img src="{{ asset('images/new-cases.svg') }}" alt="new cases">
        <p class="text-base md:text-xl">
            @if(app()->currentLocale() == 'en') 
                New cases
            @else
                დადასტურებული
            @endif
        </p>
        <p class="text-blue-500 font-black text-2xl md:text-4xl">{{ number_format($worldwideInfo->confirmed, 0, ',') }}</p>
    </div>
    <div class="flex md:w-2/3">
        <div class="bg-green-600 md:h-64 bg-opacity-10 flex flex-col h-48 items-center justify-center mr-4 rounded-2xl w-full space-y-4">
            <img src="{{ asset('images/recovered.svg') }}" alt="recovered">
            <p class="text-base md:text-xl">
                @if(app()->currentLocale() == 'en') 
                    Recovered
                @else
                    გამოჯანმრთელებული
                @endif
            </p>
            <p class="text-green-600 font-black text-2xl md:text-4xl">{{ number_format($worldwideInfo->recovered, 0, ',')}}</p>
        </div>
        <div class="bg-yellow-500 md:h-64 bg-opacity-10 flex flex-col h-48 items-center justify-center mr-4 rounded-2xl w-full space-y-4">
            <img src="{{ asset('images/death.svg') }}" alt="death">
            <p class="text-base md:text-xl">
                @if(app()->currentLocale() == 'en') 
                    Death
                @else
                    გარდაცვლილი
                @endif
            </p>
            <p class="text-yellow-500 font-black text-2xl md:text-4xl">{{ number_format($worldwideInfo->deaths, 0, ',') }}</p>
        </div>
    </div>
</div>

@endsection