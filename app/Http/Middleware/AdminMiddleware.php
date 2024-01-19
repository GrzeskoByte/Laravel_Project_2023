<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (Auth::check() && Auth::user()->role === 'admin' || Auth::user()->role === "teacher") {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}