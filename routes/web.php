<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\WelcomeMailController;
use App\Models\Country;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['change-locale'])->group(function () {
	Route::get('/email/verify/{id}/{hash}', [WelcomeMailController::class, 'verifyUser'])->name('verification.verify');

	Route::get('/email/verify', [WelcomeMailController::class, 'verificationNotice'])->middleware('auth')->name('verification.notice');

	Route::get('/', function () {
		if (auth()->check())
		{
			return to_route('dashboard');
		}

		return to_route('register');
	})->name('home')->middleware('change-locale');

	Route::get('register', function () {
		return view('register');
	})->middleware('guest')->name('register');

	Route::post('register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

	Route::get('login', function () {
		return view('login');
	})->name('login')->middleware('guest');

	Route::post('login', [SessionController::class, 'store'])->name('login')->middleware('guest');

	Route::post('logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');

	Route::get('/forgot-password', function () {
		return view('auth.forgot-password');
	})->middleware('guest')->name('password.request');

	Route::post('/forgot-password', function (Request $request) {
		$request->validate(['email' => 'required|email']);

		$status = Password::sendResetLink(
			$request->only('email')
		);

		return $status === Password::RESET_LINK_SENT
				? view('auth.verify-email')->with(['status' => __($status)])
				: back()->withErrors(['email' => __($status)]);
	})->middleware('guest')->name('password.email');

	Route::get('/reset-password/{token}', function ($token, Request $request) {
		return view('auth.reset-password', ['token' => $token, 'email' => $request->only('email')]);
	})->middleware('guest')->name('password.reset');

	Route::post('/reset-password', function (Request $request) {
		$request->validate([
			'token'    => 'required',
			'email'    => 'required|email',
			'password' => 'required|min:3|confirmed',
		]);

		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function ($user, $password) {
				$user->forceFill([
					'password' => $password,
				])->setRememberToken(Str::random(60));
				$user->save();

				event(new PasswordReset($user));
			}
		);

		return $status === Password::PASSWORD_RESET
				? view('auth.password-updated')->with('status', __($status))
				: back()->withErrors(['email' => [__($status)]]);
	})->middleware('guest')->name('password.update');

	Route::get('dashboard', function () {
		return view('worldwide', [
			'worldwideInfo' => Country::where('code', 'WRLD')->first(),
		]);
	})->name('dashboard')->middleware('verified');

	Route::get('countries', function () {
		return view('countries');
	})->name('countries')->middleware('verified');

	Route::post('change-language', function (Request $request) {
		return back();
	})->name('change-language');
});
