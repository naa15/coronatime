<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WelcomeMailController extends Controller
{
	public function verifyUser(Request $request, $id, $hash)
	{
		$user = User::find($id);

		if ($user && $user->verification_token === $hash)
		{
			$user->email_verified_at = Carbon::now();
			$user->save();
			return view('auth.verified-email');
		}

		return abort(401);
	}

	public function verificationNotice()
	{
		return view('auth.verify-email');
	}
}
