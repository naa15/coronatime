@extends('layout')

@section('content')

<div class="flex sm:justify-between">
    <div class="left-side" style="width: 58%">
        <div class="mt-10 ml-36">
            <img class="w-44 h-11" src="{{ asset('/images/logo.svg') }}" alt="coronatime logo">
                @yield('slot')
        </div>
    </div>

    <div class="right-side invisible lg:visible" style="width: 42%; background: #010414;">
        <img src="{{ asset('/images/vaccines.png') }}" alt="vaccines" width="100%" style="opacity: 0.84;">
    </div>
</div>



@endsection
