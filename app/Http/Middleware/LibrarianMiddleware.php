<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LibrarianMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        if ($user->role == "librarian") {
            return $next($request);
        }
        return response(['message' => 'You are not a librarian']);
    }
}
