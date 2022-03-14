<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
	return view('dashboard');
})->name('dashboard')->middleware('verified');

Route::get('/clear-cache', function () {
	$exitCode = Artisan::call('cache:clear');
	return $exitCode . ' cache cleared';
});

Route::get('reset-password-1', function() {
	return view('reset-password-1');
})->name('reset-password-1');

Route::post('reset-password-1', function() {
	return view('auth.check-email');
})->name('reset-password-1');

Route::get('reset-password-2', function() {
	return view('reset-password-2');
})->name('reset-password-2');
