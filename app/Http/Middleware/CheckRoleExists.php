<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;

class CheckRoleExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user) {
            // Check if the role exists in the UserRole model
            $roleExists = UserRole::where('role', $user->role)->where('is_deleted', 0)->exists();

            if (!$roleExists) {
                // Log the user out if their role does not exist
                Auth::logout();

                // Redirect to login page with an error message
                return redirect('/login')->withErrors([
                    'role' => 'Your role is not authorized to log in.',
                ]);
            }
        }

        return $next($request);
    }
}
