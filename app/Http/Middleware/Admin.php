<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check()) {
            $userRole = auth()->user()->role;
            Log::info('User Role: ' . $userRole); // Log the user role
            if ($userRole == 'Admin' || $userRole == 'Instructor') {
                return $next($request);
            }
        }

        abort(403, "You don't have Admin access.");
    }
}
