<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Demo</title>
</head>
<body>
    <h1>Pagina de Prueba para Middleware Autorizacion Alumno</h1>
    <br>
     <!-- muestra el usuario logueado  cuenta Users -->
     @if (Auth::check())
        <h2 style="background-color: grey; margin-bottom: 0px; padding: 5px; color: white;">
            Usuario:  {{ Auth::user()->name }} 
            ID:  {{ Auth::user()->id }} 
        </h2>
    @endif
    <br>
    <a href="{{ url('/') }}"><button>Retornar</button></a>
</body>
</html>