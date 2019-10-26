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
           <h2>Formulario EDIT</h2>
            <form method="POST" action="{{ route('myDemoCRUD.update', ['id' => $date->id ]) }}">
                    @csrf 
                    @method('PUT')
                   <!-- campo Nombre -->
                    <div class="form-group">
                        <label for="titulo">Nombre</label>
                        <input type="text" class="form-control"  name="nombre" value="{{ $date->nombre }}">        
                    </div>
                    <!-- campo Edad -->
                    <div class="form-group">
                        <label for="descripcion">Edad</label>
                        <input type="text" class="form-control"  name="edad" value="{{ $date->edad }}">   
                    </div>
                    <!-- campo Email -->
                    <div class="form-group">
                            <label for="descripcion">Email</label>
                            <input type="text" class="form-control"  name="email" value="{{ $date->email }}">   
                    </div>
                    
                    <br>
                    <!-- btn submit -->
                    <button type="submit" class="btn btn-primary">Submit</button>             
           </form>
            <div class="col-md-2 offset-10">
                <a href="{{ route('myDemoCRUD.index') }}">
                        <button type="button" class="btn btn-success">Regresar</button>
                </a>       
            </div>

           @if (session('report'))
               <h1>{{ session('report') }}</h1>
           @endif
                        
    </div>
</div>


 <!-- Bootstrap core JavaScript -->
 <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
 <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>