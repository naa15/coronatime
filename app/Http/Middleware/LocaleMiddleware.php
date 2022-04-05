<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 *
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, Closure $next)
	{
		if ($request['lang'] && in_array($request['lang'], ['en', 'ka']))
		{
            app()->setLocale($request['lang']);
            session()->put('locale', $request['lang']);
		} else if(session('locale')) {
            app()->setLocale(session('locale'));
        }

		return $next($request);
	}
}
