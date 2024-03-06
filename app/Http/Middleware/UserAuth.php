<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $isAdmin = session('user_type') ?? null;

        if(!$isAdmin){
            
            return $next($request);
        }

        else{
            abort(403, 'Access denied. You are not authorized to view this page.');


        }
    }
}
