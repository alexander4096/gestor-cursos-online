<?php

namespace cursos\Http\Middleware;

use Closure;

class AlumnosAuthMiddleware
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
        // confirma si no esta logueado por el usuario
        if(!auth()->check()) {
            return redirect('login');
        }
        return $next($request);
    }
}
