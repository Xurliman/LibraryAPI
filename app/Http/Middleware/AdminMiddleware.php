<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if ($user->role == "admin") {
            return $next($request);            
        }
        return response(['message' => 'You are not an admin']);
    }
}
