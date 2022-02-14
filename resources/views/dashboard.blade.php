@extends('layout')

@section('content')
    this is dashboard
    <form action="logout" method="POST">
        @csrf
        <x-button> logout </x-button>
    </form>
@endsection