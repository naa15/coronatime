@extends('accountConfirmLayout')

@section('slot')

<img src="{{ asset('images/checkicon.svg')}}" alt="check">

<p class="mt-4">{{ __('messages.confirmation_email_sent_message') }}</p>

@endsection