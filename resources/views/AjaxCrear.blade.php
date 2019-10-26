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
  <style>
     #notificacion {
        display: none; position: absolute; top:50%; width: 80%; left: 0; right: 0;
        margin-left: auto; margin-right: auto; text-align: center;
        -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
        -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
        box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.75);
     }
  </style>
</head>

<body>
<div class="container-fluid">
 <div class="row">
     <div class="col-md-12">
            <h1 class="text-center">CREAR CURSOS</h1>
<!-- se copia el bloque form de register -->
<form method="POST" action="{{ url('AjaxCrear') }}" id="formulario">
        @csrf
        <div class="form-group row">
            <label for="titulo" class="col-md-4 col-form-label text-md-left">Titulo</label>
            <div class="col-md-12">
                <input id="titulo" type="text" class="form-control" name="titulo" value="" required autofocus>
            </div>
        </div>     
        <div class="form-group">
                <label for="exampleFormControlTextarea1">Breve Descripcion</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"></textarea>
        </div>     
        <div class="form-check">
                <input class="form-check-input" type="checkbox" id="defaultCheck1" name="destacado">
                <label class="form-check-label" for="defaultCheck1">
                 Mostrar en Galeria Carrusel
                </label>
        </div>       
        <br>
        <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion Larga</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detalle"></textarea>
        </div>
       <!-- boton de registrar -->
        <div class="form-group row mb-0">
            <div class="col-md-2 offset-md-10">
                <button type="submit" class="btn btn-primary" id="BtnRegistrar">
                    Registrar
                </button>
            </div>
        </div>
    </form>
     </div>
 </div>
</div>

    {{-- btn listado cursos --}}
    <div class="col-md-2 offset-md-4">
            <a href="{{ url('AjaxLectura') }}">
                <button  class="btn btn-danger">
                        Retornar
                </button>
            </a>
    </div>

<!-- notificacion de grabado -->
<div id="notificacion" class="alert alert-success alert-dismissable"  role="alert" 
style="">
   <strong>Se ha Agregado un Registro</strong>
</div>

{{--  Historico de Cursos registrados --}}
<div id='historico' style="display: none;">
    <h3>Historico de Creaciones</h3>
    <ul>
    </ul>
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
            // AJAX
            $.ajax({
                type: "POST",
                url: "{{ url('AjaxCrear') }}",
                data: dataString,
                success: function(data) {
                        $('#historico').fadeIn(); // mostrar historico
                        $('#notificacion').fadeIn(); // mostrar notificacion
                        setTimeout(function(){ $('#notificacion').fadeOut(); }, 1000); // ocultar mensaje 1s
                        $('#formulario')[0].reset(); // limpiar form
                        // leer el JSON de retono
                        $(data).each(function(key,value) {
                            $("ul").append("<li>  "+ value.titulo + " fecha: "+ value.created_at + " ID:" + value.id + " </li>");
                        })
                        
                }
            });
    
        });
   
        
    }); 
</script>

</body>
</html>