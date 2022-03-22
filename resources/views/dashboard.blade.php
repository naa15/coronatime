@extends('layout')

@section('content')
    <div class="">
        <header class="border-b">
            <div class="flex justify-between sm:ml-28 sm:mr-28 mb-5">
                <img class="sm:ml-0 ml-4 mt-5" src="{{ asset('/images/logo.svg') }}" alt="coronatime logo">
                <div class="flex items-center mr-4 mt-7 space-x-4">
                    <select class="bg-white" name="lang" id="lang" style="width: 80px;">
                        <option value="eng">English</option>
                        <option value="ka">Georgian</option>
                    </select>
                    <img class="w-5 md:hidden" src="{{ asset('images/menu.svg') }}" alt="menu">
                    <p class="hidden md:block font-bold border-r pr-4">John Smith</p>
                    <form action="logout" method="POST" class="hidden md:block">
                        @csrf
                        <button type="submit" class="">logout</button>
                    </form>
                </div>
            </div>
        </header>
        <main class="md:ml-28 md:mr-28">
            <p class="ml-4 font-black text-xl md:text-2xl mt-6">Worldwide Statistics</p>
            <div class="ml-4 flex space-x-6 mt-6 mb-4 border-b">
                <p class="text-sm md:text-base @if(request()->routeIs('dashboard')) border-b-2 font-bold border-black @endif">Worldwide</p>
                <p class="text-sm md:text-base @if(request()->routeIs('countries')) border-b-2 font-bold border-black @endif">By country</p>
            </div>
            @yield('slot')
        </main>
    </div>
@endsection
