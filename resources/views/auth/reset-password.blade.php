@extends('accountConfirmLayout')

@section('slot')
    <p class="text-2xl font-black">
        Reset Password
    </p>

    <form action="{{ route('password.update') }}" class="ml-4 mr-4" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <x-input id="email" class="w-full" type="email" name="email" :value="old('email', $email['email'])" required autofocus />
        <x-input class="w-full" name="password" type="password" placeholder="Enter new password" required />
        <x-input name="password_confirmation" type="password" placeholder="Repeat password" required />
        <x-button>{{ ucwords('save changes') }}</x-button>
    </form>
@endsection
