<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user() || auth()->user()->role !== 'admin') {
            return redirect()->route('dashboard')->with('error', 'Unauthorized access.'); // Check if the user is an admin
        }

        return $next($request); // Allow the request to proceed if the user is an admin
    }
}
