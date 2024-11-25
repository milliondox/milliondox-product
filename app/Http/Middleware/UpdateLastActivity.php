<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UpdateLastActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
{
    $user = Auth::User(); // Fetch the authenticated user
    // dd($user);

    // Ensure the user is authenticated
    if (Auth::check()) {
        // dd($user->id); // Debug the authenticated user

        // Prepare the query to update the last_activity_at field
        $query = DB::table('user_logs')
            ->where('user_id', $user->id)
            ->orderBy('id', 'desc') // Order by ID
            ->limit(1);

        // Debug the query
        // dd($query->toSql(), $query->getBindings());

        // Execute the update
        $query->update(['last_activity_at' => now()]);
    }

    // Proceed to the next middleware or request handler
    return $next($request);
}

}
