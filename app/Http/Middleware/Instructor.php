<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Instructor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && session()->has('user_role') && (session('user_role') == 'Admin' || session('user_role') == 'Instructor')) {
            return $next($request);
        }

        abort(403, "You don't have Admin or Instructor access.");
    }
}
