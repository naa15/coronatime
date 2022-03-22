@extends('accountConfirmLayout')

@section('slot')

<img src="{{ asset('images/checkicon.svg')}}" alt="check">

Your password has been updeted successfully

<a href="{{ route('login') }}">
    <x-button>Sign in</x-button>
</a>
@endsection