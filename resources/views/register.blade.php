@extends('authLayout')

@section('slot')

    <form class="mt-14 flex flex-col" action="/register" method="POST">
        @csrf
        <p class="font-bold text-2xl w-96">Welcome to Coronatime</p>
        <p class="text-xl mt-2 text-gray-400 w-96">Please enter required info to sign up</p>
        <x-input name="username" placeholder="Enter unique username" required />
        <x-input name="email" placeholder="Enter your email" required />
        <x-input name="password" type="password" placeholder="Fill in password" required />
        <x-input id="" name="password_confirmation" type="password" placeholder="Repeat password" required />

        <x-button>
            Sign up
        </x-button>
        <p class="text-lg text-gray-500 mt-3 ml-10">Already have an account? <a class="font-bold text-black"
                href="{{ route('login') }}">Log in</a></p>
    </form>


@endsection
