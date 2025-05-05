<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the logged-in user is an admin
        if (auth()->user() && auth()->user()->role === 'admin') {
            return $next($request);
        }

        return redirect('/home'); // Redirect non-admins to the home page
    }
}
