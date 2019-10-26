<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Idioma [{{ app()->getLocale() }}]</title>
</head>
<body>
    <h1>Prueba de Idioma</h1>
    <br>
    {{--  Coloca saludo en traduccion--}}
    <h4>Saludos</h4>
    <p>{{ trans('indice.saludo') }}</p>

    <h3>Traduccion por lineas</h3>
    <p>{{ __('esta es una linea de codigo') }}</p>
    <p>{{ __('si no hay traduccion se mantiene') }}</p>
    <p>{{ __('traduccion') }}</p>
    
    {{--  Coloca despedida en traduccion--}}
    <h4>contenido</h4>
    <p>{{ trans('indice.contenido') }}</p>

    <p>Links de Idiomas:</p>
    <ul>
        <li><a href="/idiomas/en">English</a></li>
        <li><a href="/idiomas/es">Español</a></li>
        <li><a href="/idiomas/fr">Frances</a></li>
        <li><a href="/idiomas/jp">Japones</a></li>
    </ul>

    <a href="/idiomas-contenido"><button>Ir a contenido de la pagina</button></a>
</body>
</html>