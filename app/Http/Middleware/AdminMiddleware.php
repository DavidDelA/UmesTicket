<?php

namespace App\Http\Middleware;

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
        info($request->get('user'));
        if (($request->user()) && $request->user()->type != 'admin')
        {
            return new response(view('unauthorized')->with('role','ADMIN'));
        }
        return $next($request);
    }
}
