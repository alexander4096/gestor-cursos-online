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
<div class="container-fluid">
 <div class="row">
     <div class="col-md-12">
            <h1 class="text-center">EDITAR CURSOS</h1>
     </div>
 </div>

   {{-- bloque form de Editar --}}
   <form method="POST" action="{{ url('AjaxEditar/'. $curso->id ) }}" id="formulario">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="titulo" class="col-md-4 col-form-label text-md-left">Titulo</label>
            <div class="col-md-12">
            <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $curso->titulo }}" autofocus>
            </div>
        </div>
        
        <div class="form-group">
                <label for="exampleFormControlTextarea1">Breve Descripcion</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion">{{ $curso->descripcion }}</textarea>
        </div>
      
        <div class="form-check">
                <!-- marcar producto destacado -->
                @php
                    $destacado = ($curso->destacado==1 )? "checked" : ""; 
                @endphp
                <input class="form-check-input" type="checkbox" {{ $destacado }}  id="defaultCheck1" name="destacado">
                <label class="form-check-label" for="defaultCheck1">
                 Mostrar en Galeria Carrusel
                </label>
        </div>
        
        <br>
        <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion Larga</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detalle">{{ $curso->detalle }}</textarea>
        </div>

                  <div class="col-md-2 offset-md-2">
                      <button type="submit" class="btn btn-primary" id="BtnRegistrar">
                          ACTUALIZAR
                      </button>
                  </div>
         </div>
         <br>
        {{--  Reporte de actualizar curso --}}
        <h3 id='notificacion' style="display: none;"></h3>

    </form>
    <!-- fin de form -->

    {{-- btn listado cursos --}}
    <div class="col-md-2 offset-md-4">
            <a href="{{ url('AjaxLectura') }}">
                <button  class="btn btn-danger">
                        Retornar
                </button>
            </a>
    </div>
    
</div>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <script type="text/javascript">
    $(document).ready(function()
    {
        // boton de registrar
        $('#BtnRegistrar').click(function(event) {
            event.preventDefault();
            var dataString = $('#formulario').serialize(); // carga todos los campos para enviarlos
            var form = $(this).parents('form'); // tomar el formulario
            var url = form.attr('action'); // tomar la URL
            // otra forma de AJAX
            $.post(url, dataString, function(result) {
                $('#notificacion').html('Fecha: '  + result.update  + ' <br> Notificacion: ' + result.mensaje);
                $('#notificacion').fadeIn(); // mostrar notificacion
                $('#notificacion').delay(1500).fadeOut(); // Ocultar notificacion
            }).fail(function() {
                alert('No se pudo Actualizar');
            });
    }); 
</script>

</body>
</html>