<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class AdminMiddleware
{
    public function handle (Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->is_admin == 1) {
            return $next($request);
        } elseif (Auth::check()) {
            // Redirect non-admin users to the home page.
            return redirect('/')->with('error', 'Access to the admin section is denied.');
        }

        // If the user is not logged in, redirect to the admin login page.
        return redirect('admin');
    }
}

