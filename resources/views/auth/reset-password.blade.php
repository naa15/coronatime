@extends('accountConfirmLayout')

@section('slot')
    <p class="text-2xl font-black">
        Reset Password
    </p>

    <form action="{{ route('password.update') }}" class="ml-4 mr-4" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <x-label name="{{ __('messages.email_label') }}" />
        <x-input id="email" class="w-full" type="email" name="email" :value="old('email', $email['email'])" required autofocus placeholder="{{ __('messages.email_placeholder') }}" />
        <x-label name="{{ __('messages.password_label') }}" />
        <x-input class="w-full" name="password" type="password" placeholder="{{ __('messages.password_placeholder') }}" required />
        <x-label name="{{ __('messages.password_confirmation_label') }}" />
        <x-input name="password_confirmation" type="password" placeholder="{{ __('messages.password_confirmation_placeholder') }}" required />
        <x-button>{{ __('messages.save_changes_label') }}</x-button>
    </form>
@endsection
