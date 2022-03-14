@extends('accountConfirmLayout')

@section('slot')

<p class="text-2xl font-black">
    Reset Password
</p>

<form action="reset-password-2" class="ml-4 mr-4" method="POST">
    @csrf
    <x-input class="w-full" name="New Password" type="password" placeholder="Enter new password" required />
    <x-input name="password_confirmation" type="password" placeholder="Repeat password" required />
    <x-button>{{ ucwords('save changes') }}</x-button>
</form>

@endsection