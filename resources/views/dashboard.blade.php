@extends('layout')

@section('content')
    <div class="">
        <header class="border-b">
            <div class="flex justify-between sm:ml-28 sm:mr-28 mb-5">
                <a href="/"><img class="sm:ml-0 ml-4 mt-5" src="{{ asset('/images/logo.svg') }}" alt="coronatime logo"></a>
                <div class="flex items-center mr-4 mt-7 space-x-4">
                    <form action="{{ route('change-language') }}" method="POST">
                        @csrf
                        <select onchange="this.form.submit()" class="bg-white" name="lang" id="lang">
                            <option value="en" @if(app()->currentLocale() == 'en') selected @endif>English</option>
                            <option value="ka" @if(app()->currentLocale() == 'ka') selected @endif>Georgian</option>
                        </select>
                    </form>
                    <x-responsive-menu class=" w-5"/>
                    <p class="hidden md:block font-bold border-r pr-4">{{ auth()->user()->username }}</p>
                    <form action="logout" method="POST" class="hidden md:block">
                        @csrf
                        <button type="submit" class="">{{ __('messages.log_out') }}</button>
                    </form>
                </div>
            </div>
        </header>
        <main class="md:ml-28 md:mr-28">
            <p class="ml-4 font-black text-xl md:text-2xl mt-6">
                {{ __('messages.worldwide_statistics_title') }}
            </p>
            <div class="ml-4 flex space-x-6 mt-6 mb-4 border-b">
                <a href="{{ route('dashboard') }}" class="text-sm md:text-base @if(request()->routeIs('dashboard')) border-b-2 font-bold border-black @endif">
                    {{ __('messages.worldwide_title') }}
                </a>
                <a href="{{ route('countries') }}" class="text-sm md:text-base @if(request()->routeIs('countries')) border-b-2 font-bold border-black @endif">
                    {{ __('messages.by_country') }}
                </a>
            </div>
            @yield('slot')
        </main>
    </div>
@endsection
