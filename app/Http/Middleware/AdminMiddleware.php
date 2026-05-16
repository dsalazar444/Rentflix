<?php

// Made by: Samuel Martínez Arteaga

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Closure;

class AdminMiddleware
{
    
    public function handle(Request $request, Closure $next): Response
    {
        $userRole = $request->session()->get('role');

        if (! $userRole || $userRole !== 'admin') {
            abort(403);
        }
        
        return $next($request);
    }
}