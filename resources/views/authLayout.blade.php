@extends('layout')

@section('content')

<div class="md:flex md:justify-between">
    <div class="left-side md:w-3/5">
        <div class="lg:ml-36 md:w-96 ml-10 mr-10 mt-10">
            <div class="flex justify-between items-center">
                <img class="w-48" src="{{ asset('/images/logo.svg') }}" alt="coronatime logo">
                <form action="{{ route('change-language') }}" method="POST">
                    @csrf
                    <select onchange="this.form.submit()" class="bg-white" name="lang" id="lang">
                        <option value="en" @if(app()->currentLocale() == 'en') selected @endif>English</option>
                        <option value="ka" @if(app()->currentLocale() == 'ka') selected @endif>Georgian</option>
                    </select>
                </form>
            </div>
                @yield('slot')
        </div>
    </div>

    <div class="right-side invisible lg:visible" style="width: 42%; background: #010414;">
        <img src="{{ asset('/images/vaccines.png') }}" alt="vaccines" width="100%" style="opacity: 0.84;">
    </div>
</div>



@endsection
