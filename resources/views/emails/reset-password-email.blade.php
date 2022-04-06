@component('mail::message')
# Confirmation email

click this button to verify your email

@component('mail::button', ['url' => $url ])
Verify Email
@endcomponent

@endcomponent
