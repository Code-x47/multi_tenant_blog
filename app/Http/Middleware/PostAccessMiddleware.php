<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
      // Allow if the user is an admin
        if($user->role === 'admin'){
        return $next($request);
        }

      // Allow if the user is the owner of their tenant
        if ($user->tenant && $user->tenant->user_id === $user->id) {
        return $next($request);
    }
      //Access Denied
        return response()->json(['message' => 'Unauthorized.'], 403);
        
    }
}
