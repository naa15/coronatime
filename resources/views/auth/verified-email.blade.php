@extends('accountConfirmLayout')

@section('slot')

Your account is confirmed, you can sign in

<a href="{{ route('login') }}">
    <x-button>Sign in</x-button>
</a>
@endsection