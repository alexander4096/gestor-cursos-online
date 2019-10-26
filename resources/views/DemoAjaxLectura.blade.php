
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
      .pagination {
                    justify-content: center;
                 }
  </style>
  
</head>

<body>
<h1 class="text-center" style="margin-bottom: 100px;">Paginacion con Busqueda</h1>
<!-- boton de search -->
<nav class="navbar navbar-light bg-light">
        <form class="form-inline" method="GET" action="{{ url('/AjaxLectura') }}">
        <input class="form-control mr-sm-2" id="search" type="text" placeholder="Search" name="search" value="{{ $search }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
</nav>
{{-- btn  crear cursos --}}
<div class="col-md-2 offset-md-4">
        <a href="{{ url('AjaxCrear') }}">
            <button  class="btn btn-danger">
                    Crear CURSO
            </button>
        </a>
</div>
    <div id="tag_container">
            @include('resultadoAJAX')
    </div>


  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  
<script type="text/javascript">
    var globalsearch='';

    $(document).ready(function()
    {
        // Controles paginacion
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault(); 
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
            var page=$(this).attr('href').split('page=')[1];
            getData(page);
        });
        
        // boton submit
        $("form").submit(function(event){
            event.preventDefault();
            getData(1);
        });

        // se teclea un caracter en la busqueda
        $("#search").keyup(function(event){
            event.preventDefault();
            getData(1);
        });

    // funcion AJAX
    function getData(page){
        $.ajax({
            url: '?page=' + page,
            type : "get",
            data:{
                search: $('#search').val()
            },
            success: function(data) {
                $("#tag_container").html(data);
            }
        });
        
    }
    

        // borrar dinamico por que tabla se actualiza DELEGACION
        $(document).on('click','.btn-delete',function(e) {
        e.preventDefault();
        var form = $(this).parent('form');
        var search = $("#search").val();
        var dataString= form.serialize(); // necesario para enviar el _token
        var url = form.attr('action');
            // AJAX agrega un campo extra en SERIALIZE
            $.post(url, dataString+'&'+$.param({ 'search': search }), function(result) {
                    $("#tag_container").html(result);
                }).fail(function() {
                    alert('No se pudo Actualizar');
                });
        });


    }); // fin



</script>

</body>
</html>