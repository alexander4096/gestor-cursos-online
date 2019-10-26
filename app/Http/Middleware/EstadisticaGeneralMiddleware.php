<?php

namespace cursos\Http\Middleware;

use Closure;
use cursos\StatisticsModel; // modelo para guardar registro

class EstadisticaGeneralMiddleware
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
       $ejecutarEstadistica=TRUE;
       
       if($ejecutarEstadistica)
       {
            $time = date('Y-m-d H:i:s', $request->server('REQUEST_TIME')); // carga de vista 2019-06-06 14:55:51
            $uri  =  $request->server('REQUEST_URI'); // direccion de vista
            $ip = $request->ip();  // id
            
                // grabar historico 
                $StatisticsModel= new StatisticsModel(); // Crea objeto
                // carga los valore de los campos 
                $StatisticsModel->name = 'anonimo';
                $StatisticsModel->uri  = $uri;
                $StatisticsModel->ipAddress  =  $ip;
                $StatisticsModel->fechavisita = $time;
                $StatisticsModel->save(); // guarda el registro
       }

        return $next($request);
    }
}
