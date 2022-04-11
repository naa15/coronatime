@extends('accountConfirmLayout')

@section('slot')

<p class="text-center">{{ __('messages.account_confirmed_label') }}</p> 

<a href="{{ route('login') }}">
    <x-button>{{ __('messages.sign_in_button_label') }}</x-button>
</a>
@endsection