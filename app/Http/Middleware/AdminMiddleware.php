<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        
        if (Auth::check())
        {
            if(Auth::user()->type = 'admin'){
                return $next($request);
            }
            
        }
            $link = "/";
            $mensaje = "Usuario no Autorizado.";
            return response(view('Error', compact('mensaje','link')));
        
    }
}
