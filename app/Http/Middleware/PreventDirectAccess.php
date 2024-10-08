<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class PreventDirectAccess
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
    // Main URL (replace with your website's main URL)
    $mainUrl = url('/');

    // Define allowed URLs (add any routes that should bypass the middleware)
    $allowedUrls = [
        $mainUrl,
        route('login'),  // Allow login page
        route('register'),  // Allow register page
        // Add other routes if needed
    ];

    // Check if the requested URL is in the allowed URLs
    if (!in_array($request->url(), $allowedUrls)) {
        // Redirect to the main URL if accessing anything else
        return redirect($mainUrl)->with('error', 'Direct access to this URL is not allowed.');
    }

    return $next($request);
}

}
