<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>CRUD Crear</title>
  <!-- Bootstrap core CSS  -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="col-md-8 offset-2">
           <h2>Formulario SHOW</h2>
            <form method="" action="">
                    @csrf 
                   <!-- campo Nombre -->
                    <div class="form-group">
                        <label for="titulo">Nombre</label>
                        <input type="text" class="form-control"  name="nombre" value="{{ $date->nombre }}" readonly>        
                    </div>
                    <!-- campo Edad -->
                    <div class="form-group">
                        <label for="descripcion">Edad</label>
                        <input type="text" class="form-control"  name="edad"  value="{{ $date->edad }}" readonly>   
                    </div>
                    <!-- campo Email -->
                    <div class="form-group">
                            <label for="descripcion">Email</label>
                            <input type="text" class="form-control"  name="email"  value="{{ $date->email }}" readonly>   
                    </div>
                            
           </form>
            <div class="col-md-2 offset-10">
                <a href="{{ route('myDemoCRUD.index') }}">
                        <button type="button" class="btn btn-success">Regresar</button>
                </a>       
            </div>     
    </div>
</div>


 <!-- Bootstrap core JavaScript -->
 <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>