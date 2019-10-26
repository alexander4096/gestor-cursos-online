<?php

namespace cursos\Http\Middleware;

use Closure;
use Session; // usar variable de session

class PruebaGeneralMiddleware
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
      
        $time = date('m/d/Y H:i:s', $request->server('REQUEST_TIME')); // carga de vista
        $uri  =  $request->server('REQUEST_URI'); // direccion de vista
        $ip = $request->ip();  // id

        // aviso de ejecucion del middleware general
        echo '<style> #aviso00 { position: absolute; left: 100px; top: 350px; background:white; z-index:9000; } </style>';
        echo '<h5 id="aviso00"> Time: '. $time . '[uri:] ' . $uri. '[ip]: '. $ip. '</h5>';
        echo '<script> setTimeout(function(){ document.getElementById("aviso00").setAttribute("style", "display:none;"); }, 3000);  </script>';

        return $next($request);
    }
}
