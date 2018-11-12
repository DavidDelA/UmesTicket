<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class UserMiddleware
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
        $link = "/login";
        $mensaje = "Porfavor iniciar sesión.";
        if (Auth::check())
        {   
            if(Auth::user()->type = 'admin'){
                $link = "/";
                $mensaje = "Característica solo para usuarios.";
            }else{
                return $next($request);
            }
        }
            return response(view('Error', compact('mensaje','link')));
    }
}
