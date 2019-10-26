<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

@auth('admin')
  <h5>Bienvenido usuario administrado:</h5>
  <p> tiene todos los privilegios</p>
@endauth

@auth('web')
  <h5>Bienvenido usuario Normal:</h5>
  <p> privilegios personales</p>
@endauth

</body>
</html>