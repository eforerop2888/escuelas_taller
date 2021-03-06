<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Loggin
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
        if (Auth::user()) {
            return redirect('/bienvenida');
        }
        return $next($request);
    }
}
