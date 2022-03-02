@extends('layout')

@section('content')

<div class="flex justify-between">
    <div class="left-side" style="width: 58%">
        <div class="mt-10 ml-10 lg:ml-36">
            <img class="w-40 h-10" src="{{ asset('/images/logo.svg') }}" alt="coronatime logo">
                @yield('slot')
        </div>
    </div>

    <div class="right-side invisible lg:visible" style="width: 42%; background: #010414;">
        <img src="{{ asset('/images/vaccines.png') }}" alt="vaccines" width="100%" style="opacity: 0.84;">
    </div>
</div>



@endsection
