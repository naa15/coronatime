@extends('authLayout')

@section('slot')

    <form class="mt-14 flex flex-col" action="login" method="POST">
        @csrf
        <p class="font-bold text-2xl">{{ __('messages.welcome_back_message') }}</p>
        <p class="text-xl mt-2 text-gray-400">{{ __('messages.welcome_back_subtitle') }}</p>
        <x-label name="{{ __('messages.username_label') }}" />
        <x-input name="username" placeholder="{{ __('messages.username_placeholder') }}" required />
        <x-label name="{{ __('messages.password_label') }}" />
        <x-input name="password" type="password" placeholder="{{ __('messages.password_placeholder') }}" required />
        <p class="flex justify-end mt-6">
            <a class="font-semibold text-blue-600" href="{{ route('password.request') }}">{{ __('messages.forgot_password_label') }}</a>
        </p>
        <x-button>
            {{ __('messages.sign_in_button_label') }}
        </x-button>
        <p class="text-lg text-gray-500 mt-3 md:ml-10 md:w-96">{{ __('messages.register_label') }} <a class="font-bold text-black"
                href="{{ route('register') }}">{{ __('messages.sign_up_button_label') }}</a></p>
    </form>



@endsection
