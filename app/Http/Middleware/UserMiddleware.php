<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;
class UserMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->is_admin == 0) {
                return $next($request);
            } else {
                // Redirect admins to the admin dashboard.
                return redirect('admin/dashboard');
            }
        }

        // If the user is not logged in, redirect to the login page.
        return redirect('/?login=true');
    }
}

