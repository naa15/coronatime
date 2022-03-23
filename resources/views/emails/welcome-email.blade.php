@component('mail::message')
# Verify Email

Click the button below to verify your email address.

@component('mail::button', ['url' => $url ])
Verify Email Adress
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
