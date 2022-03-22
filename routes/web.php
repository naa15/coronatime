<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
	// dd(auth()->user());
	$request->fulfill();

	auth()->logout();

	return view('auth.verified-email');
})->name('verification.verify');
// ->middleware(['auth', 'signed'])

Route::post('/email/verification-notification', function (Request $request) {
	$request->user()->sendEmailVerificationNotification();

	return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/email/verify', function () {
	return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
	if (auth()->check())
	{
		return to_route('dashboard');
	}

	return to_route('register');
})->name('home');

Route::get('register', function () {
	return view('register');
})->middleware('guest')->name('register');

Route::post('register', [RegisterController::class, 'store'])->name('register')->middleware('guest');

Route::get('login', function () {
	return view('login');
})->name('login')->middleware('guest');

Route::post('login', [SessionController::class, 'store'])->name('login')->middleware('guest');

Route::post('logout', [SessionController::class, 'destroy'])->name('logout')->middleware('auth');

Route::get('dashboard', function () {
	return view('worldwide');
})->name('dashboard')->middleware('verified');

Route::get('countries', function () {
	return view('countries');
})->name('countries')->middleware('verified');

Route::get('/clear-cache', function () {
	$exitCode = Artisan::call('cache:clear');
	return $exitCode . ' cache cleared';
});

Route::get('/forgot-password', function () {
	return view('auth.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
	$request->validate(['email' => 'required|email']);

	// exists:users

	$status = Password::sendResetLink(
		$request->only('email')
	);

	return $status === Password::RESET_LINK_SENT
				? view('auth.check-email')->with(['status' => __($status)])
				: back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token, Request $request) {
	return view('auth.reset-password', ['token' => $token, 'email' => $request->only('email')]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
	// dd($request->only('email', 'password', 'token'));
	$request->validate([
		'token'    => 'required',
		'email'    => 'required|email',
		'password' => 'required|min:3|confirmed',
	]);

	$status = Password::reset(
		$request->only('email', 'password', 'password_confirmation', 'token'),
		function ($user, $password) {
			$user->forceFill([
				'password' => Hash::make($password),
			])->setRememberToken(Str::random(60));
			$user->save();

			event(new PasswordReset($user));
		}
	);

	return $status === Password::PASSWORD_RESET
				? view('auth.password-updated')->with('status', __($status))
				: back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

Route::get('test_email', function(){
	Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
	{
		$message->subject('Mailgun and Laravel are awesome!');
		$message->from('nanu@redberry.ge', 'Website Name');
		$message->to('nanu@redberry.ge');
	});
});


Route::get('aba-vnaxot', function(){
	$user = App\Models\User::find(1);
    return new App\Mail\ResetPasswordEmail($user);
	// return view('vendor/mail/html/message');
});

