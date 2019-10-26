<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Idioma [{{ app()->getLocale() }}]</title>
</head>
<body>
    <h1>Idioma contenido</h1>
    <br>
    
    {{--  Coloca despedida en traduccion--}}
    <h4>contenido</h4>
    <p>{{ trans('indice.contenido') }}</p>
    
    <p>Links de Idiomas:</p>
    
    @php
       $idioma = app()->getLocale(); 
    @endphp
    <a href="/idiomas/{{ $idioma }}"><button>retornar</button></a>
</body>
</html>