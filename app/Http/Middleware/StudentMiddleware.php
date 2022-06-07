<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class StudentMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if ($user->role == "student") {
            return $next($request);            
        }
        return response(['message' => 'You are not a student']);
    }
}
