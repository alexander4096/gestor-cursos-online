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
<h1 class="text-center">Paginacion con Busqueda</h1>
<!-- boton de search -->
<nav class="navbar navbar-light bg-light">
        <form class="form-inline" method="GET" action="{{ url('/paginacionBusqueda') }}">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" name="search" value="{{ $search }}">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
</nav>

<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">titulo</th>
            <th scope="col">destacado</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($cursos as $curso)
         <tr>
            <th scope="row">{{ $curso->id }}</th>
            <td>{{ $curso->titulo }}</td>
            <td>{{ $curso->destacado }}</td>
          </tr> 
        @endforeach         
        </tbody>
  </table>

      <!-- paginacion-->
      {{ $cursos->appends(['search' => $search])->links() }}

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
      