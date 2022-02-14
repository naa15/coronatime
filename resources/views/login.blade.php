@extends('authLayout')

@section('slot')

    <form class="mt-14 flex flex-col" action="login" method="POST">
        @csrf
        <p class="font-bold text-2xl w-96">Welcome back</p>
        <p class="text-xl mt-2 text-gray-400 w-96">Welcome back! Please enter your details </p>
        <x-input name="username" placeholder="Enter unique username or email" />
        <x-input name="password" type="password" placeholder="Fill in password" />
        <x-button>
            Log In
        </x-button>
        <p class="text-lg text-gray-500 mt-3 ml-10">Don’t have an account? <a class="font-bold text-black"
                href="{{ route('register') }}">Sign up for free</a></p>
    </form>



@endsection
