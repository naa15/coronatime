<?php

namespace App\Http\Controllers;

class SessionController extends Controller
{
	public function create()
	{
	}

	public function store()
	{
		$attributes = request()->validate([
			'username' => 'required',
			'password' => 'required',
		]);

		if (auth()->attempt($attributes))
		{
            session()->regenerate();

            return to_route('dashboard');
		}

        return back()->withErrors(['username' => 'Your provided credentials could not be verified.']);
	}

	public function destroy()
	{
        auth()->logout();

        return to_route('login');
	}
}
