<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class DeniedAccess
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
        if (Auth::user()->role_id != 1) {
            $request->session()->flash('fail', 'Acceso denegado a este recurso, necesitas el rol de administrador');
            return redirect('/informes');
        }
        return $next($request);
    }
}
