<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        // Check if the user is authenticated and has the admin role
        if (Auth::check() && Auth::user()->role == 1) {
            return $next($request);
        }

        // Redirect to home or login if not authorized
        return redirect()->route('home')->with('error', 'Bạn không có quyền truy cập vào trang này.');
    }
}
