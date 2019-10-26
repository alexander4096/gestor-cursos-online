<!DOCTYPE html>
<html>
<head>
    <title>Importar y Exporta en Excel</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
</head>
<body>
   
<div class="container">
    <div class="card bg-light mt-3">
        <div class="card-header">
            Subir archivos desde Laravel
        </div>
        <div class="card-body">
            <!-- form usa enctype="multipart/form-data" -->
            <form action="{{ route('subirArchivo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label for="file">Subir Archivo a la ruta /public/upload</label>
                        <input type="file" class="form-control-file" name="file" id="file">
                </div>
                <br>
                <button type="submit" "btn btn-success">Subir Archivo</button>
            </form>
        </div>
    </div>
</div>

<!-- notificacion de subir el archivo -->
@if (Session::has('notificacion'))
        <h5>{{ Session::get('notificacion') }}</h5>
@endif


<!-- mostrar los archivos del directorio upload -->
@foreach ($uploadfiles as $uploadfile)
         <br>
         {{$uploadfile['basename']  }}
@endforeach    

</body>
</html>