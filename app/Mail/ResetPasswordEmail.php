<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPasswordEmail extends Mailable
{
	use Queueable, SerializesModels;

	public $url;

	public $user;

	/**
	 * Create a new message instance.
	 *
	 * @return void
	 */
	public function __construct($user, $url)
	{
		$this->user = $user;
		$this->url = $url;
	}

	/**
	 * Build the message.
	 *
	 * @return $this
	 */
	public function build()
	{
		return $this->from('nanu@redberry.ge')
			->markdown('emails.reset-password-email');
	}
}
