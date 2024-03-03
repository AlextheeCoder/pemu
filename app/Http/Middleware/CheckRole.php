<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $user = auth()->user();

        if (!$user || $user->role !== $role) {
            
            if ($user && $user->role === 'provider' && $role === 'farmer') {
                return redirect('/')->with('error', 'Providers are not allowed to access farmer-specific pages.');
            }

            // Check if the user is trying to access a farmer-specific page
            if ($user && $user->role === 'farmer' && $role === 'provider') {
                return redirect('/')->with('error', 'Farmers are not allowed to access provider-specific pages.');
            }

            // Check if the user is trying to access an admin page
            if ($role === 'admin') {
                return redirect('/pemu/admin/login')->with('error', 'Only administrators are allowed to access this page.');
            }

            return redirect('/')->with('error', 'You do not have access to this page. Login to access it!');
        }

        return $next($request);
    }
}
