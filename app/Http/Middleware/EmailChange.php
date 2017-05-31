<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class emailChange
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
        if (Auth::user()->passwordChange == 0) {
            $request->session()->flash('fail', 'Es necesario realizar el cambio de contraseña primero');
            return redirect()->route('contraseña');
        }
        return $next($request);
    }
}
