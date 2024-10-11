<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckFileAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Retrieve the requested file from the route parameters
        $filename = $request->route('filename');

        // Optionally, add custom logic to check if the user has access to the file
        // For example, check if the file belongs to the authenticated user
        if (!auth()->check()) {
            return abort(403, 'Unauthorized access.');
        }

        // Proceed to the next step if the user is authorized
        return $next($request);
    }
}
