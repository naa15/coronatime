@extends('accountConfirmLayout')

@section('slot')

<img src="{{ asset('images/checkicon.svg')}}" alt="check">

{{ __('messages.password_updated_message') }}

<a href="{{ route('login') }}">
    <x-button>{{ __('messages.sign_in_button_label') }}</x-button>
</a>
@endsection