@extends('accountConfirmLayout')

@section('slot')

<p class="text-2xl font-black">
    Reset Password
</p>

<form action="{{ route('password.email') }}" class="ml-4 mr-4" method="POST">
    @csrf
    <x-input name="email" placeholder="Enter your email" required />
    <x-button>{{ ucwords('reset password') }}</x-button>
</form>

@endsection