<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $path = $request->path();
        // echo session('user_type');
        
        if(($path == 'login' || $path == '/') && session('user')){

            if(session('user_type'))
                return redirect('/adminDashboard');
            else
                return redirect('/profile');

        }
        else if($path != 'login' && !session('user')){
            return redirect('/');
        }





        return $next($request);
    }
}
