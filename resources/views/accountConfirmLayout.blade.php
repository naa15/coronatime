@extends('layout')

@section('content')
    <div class="flex justify-center">
        <div class="h-screen w-96">
            <div class="sm:flex sm:justify-center">
                <img class="w-48 sm:ml-0 ml-4 mt-6" src="{{ asset('/images/logo.svg') }}" alt="coronatime logo">
            </div>
            <div class="h-3/4 flex flex-col items-center justify-center">
                @yield('slot')
            </div>
        </div>
    </div>
@endsection
