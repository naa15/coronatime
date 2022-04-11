@extends('accountConfirmLayout')

@section('slot')

<p class="text-2xl font-black">
    {{ __('messages.reset_password_label') }}
</p>

<form action="{{ route('password.email') }}" class="ml-4 mr-4" method="POST">
    @csrf
    <x-label name="{{ __('messages.email_label') }}" />
    <x-input name="email" placeholder="{{ __('messages.email_placeholder') }}" required />
    <x-button>{{ __('messages.reset_password_label') }}</x-button>
</form>

@endsection