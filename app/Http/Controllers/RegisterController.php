<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
	public function store()
	{
		$attributes = request()->validate([
			'username' => 'required|min:3|unique:users,username',
			'email'    => 'required|email|unique:users,email',
			'password' => 'required|confirmed|min:3',
		]);

		$user = User::create($attributes);

		event(new Registered($user));

		return view('auth.verify-email');
	}
}
