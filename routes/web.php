<?php

use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

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
})->name('dashboard')->middleware('auth');
