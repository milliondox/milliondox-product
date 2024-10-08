<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PreventDirectURLAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is logged in
        if (auth()->check()) {
            // Check if the session has a flag indicating internal navigation
            if (!Session::has('internal_navigation') || Session::get('internal_navigation') !== true) {
                // If no flag, it means the user is trying to access the URL directly
                return redirect('/')->with('error', 'Direct URL access is not allowed.');
            }

            // Clear the internal navigation flag after allowing access
            Session::forget('internal_navigation');
        }

        return $next($request);
    }
}
