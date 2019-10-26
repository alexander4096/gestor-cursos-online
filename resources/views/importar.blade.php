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
            Vista para importar y exportar archivo en Excel (Maatwebsite ver 3 )
        </div>
        <div class="card-body">
            <form action="{{ route('importar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                        <label for="exampleFormControlFile1">Subir Archivo XLS</label>
                        <input type="file" class="form-control-file" name="file">
                </div>
                <br>
                <button class="btn btn-success">Importar XLS</button>
                <a class="btn btn-warning" href="{{ route('exportar') }}">Exportar Tabla users_admin</a>
            </form>
        </div>
    </div>
</div>

</body>
</html>