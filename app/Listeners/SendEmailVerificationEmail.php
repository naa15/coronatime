<?php

namespace App\Listeners;

use App\Mail\WelcomeEmail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Mail;

class SendEmailVerificationEmail
{
	/**
	 * Handle the event.
	 *
	 * @param \Illuminate\Auth\Events\Registered $event
	 *
	 * @return void
	 */
	public function handle(Registered $event)
	{
		if ($event->user instanceof MustVerifyEmail && !$event->user->hasVerifiedEmail())
		{
			$url = config('app.url') . '/email/verify/' . $event->user->id . '/' . $event->user->verification_token;

			Mail::to($event->user)->send(new WelcomeEmail($url, $event->user));
		}
	}
}
