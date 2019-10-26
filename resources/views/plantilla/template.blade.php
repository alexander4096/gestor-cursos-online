<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template</title>
    <style>
     .encabezado {
        background-color: #a8cc46;
        width: 90%;
        height: 100px;
        padding: 10px;
        margin: 10px;
     }
     .encabezado h3, .cuerpo h3, .pie h3 { text-align: center; }

     .cuerpo {
        background-color: @yield('color fondo');
        width: 90%;
        height: 400px;
        padding: 10px;
        margin: 10px;
     }
     .pie {
        background-color: #8ab14a;
        width: 90%;
        height: 50px;
        padding: 10px;
        margin: 10px;  
     }
    </style>
</head>
<body>
    <div class="encabezado">
           <h3>Este es el encabezado  para @yield('titulo')</h3>
    </div>
   
    @yield('cuerpo')

    <div class="pie">
            <h3>Cuerpo</h3>
    </div>
</body>
</html>