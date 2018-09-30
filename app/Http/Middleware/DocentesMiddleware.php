<?php

namespace GIDV\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;

class DocentesMiddleware
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
        if(Auth::user()->us_idRolFK==2){
            return redirect('/calificaciones');
        }
        else{
            return $next($request);
        }
    }
}
