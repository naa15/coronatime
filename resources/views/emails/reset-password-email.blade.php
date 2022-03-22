@component('mail::message')
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

Confirmation Email

click this button to verify your email

@component('components.button', ['url' => '$url'])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
