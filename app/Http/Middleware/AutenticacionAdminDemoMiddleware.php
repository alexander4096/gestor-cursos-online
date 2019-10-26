<?php

namespace cursos\Http\Middleware;

use Closure;

class AutenticacionAdminDemoMiddleware
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
        // confirma si no esta logueado por el ADMINISTRADOR
        if(!auth()->guard('admin')->check()) {
            return redirect('ingresar-admin');
        }
        return $next($request);
    }
}
