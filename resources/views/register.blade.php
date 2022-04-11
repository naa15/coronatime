@extends('authLayout')

@section('slot')

    <form class="mt-14 flex flex-col" action="/register" method="POST">
        @csrf
        <p class="font-bold text-2xl w-96">{{ __('messages.welcome_message') }}</p>
        <p class="text-xl mt-2 text-gray-400 md:w-96">{{ __('messages.welcome_subtitle') }}</p>
        <x-label name="{{ __('messages.username_label') }}" />
        <x-input name="username" placeholder="{{ __('messages.username_placeholder') }}" required />
        <x-label name="{{ __('messages.email_label') }}" />
        <x-input name="email" placeholder="{{ __('messages.email_placeholder') }}" required />
        <x-label name="{{ __('messages.password_label') }}" />
        <x-input name="password" type="password" placeholder="{{ __('messages.password_placeholder') }}" required />
        <x-label name="{{ __('messages.password_confirmation_label') }}" />
        <x-input id="" name="password_confirmation" type="password" placeholder="{{ __('messages.password_confirmation_placeholder') }}" required />

        <x-button>
            {{ __('messages.sign_up_button_label') }}
        </x-button>
        <p class="text-lg text-gray-500 mt-3 md:ml-10 md:w-96" >{{ __('messages.already_registered_label') }}<a class="font-bold text-black"
                href="{{ route('login') }}">{{ __('messages.sign_in_button_label') }}</a></p>
    </form>


@endsection
