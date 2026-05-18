<?php

// Made by: Samuel Martínez Arteaga

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
class AdminMiddleware
{
    
    public function handle(Request $request, Closure $next): Response|RedirectResponse
    {
        $userRole = $request->session()->get('role');

        if (! $userRole || $userRole !== 'admin') {
            abort(403);
        }

        return $next($request);
    }
}
