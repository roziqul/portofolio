<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SessionExpired
{
    public function handle($request, Closure $next)
    {
        if ($request->routeIs('login') || $request->routeIs('logout')) {
            return $next($request);
        }

        if (!Session::has('lastActivityTime')) {
            Session::put('lastActivityTime', now());
        } elseif (now()->diffInMinutes(Session::get('lastActivityTime')) > config('session.lifetime')) {
            Auth::logout();
            Session::flush();
            return redirect()->route('login')->withErrors(['Your session has expired. Please login again.']);
        }

        Session::put('lastActivityTime', now());

        return $next($request);
    }
}
