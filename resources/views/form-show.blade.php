<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title></title>
  <!-- Bootstrap core CSS  -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
<div class="container">
    <div class="col-md-8 offset-2">
           <h2>Formulario Ver</h2>
                   <!-- campo titulo -->
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $curso->titulo }}" readonly>        
                    </div>
                    <!-- campo descripcion -->
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" id="descripcion" rows="3" name="descripcion" readonly>{{ $curso->descripcion }}</textarea>
                    </div>
                    <!-- campo destacado -->
                    <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" id="destacado" name="destacado" readonly  {{ $curso->destacado=="1" ? "checked": "" }}>
                        <label class="custom-control-label" for="destacado">Destacado</label>
                    </div>
                    <br>

            <div class="col-md-2 offset-10">
                <a href="{{ route('form-basico.index') }}">
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