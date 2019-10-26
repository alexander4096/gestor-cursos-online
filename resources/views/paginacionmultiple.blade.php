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
<!-- tabla cursos -->
<h2>Tabla Cursos</h2>
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
  {{ $cursos->appends(['p1' => $cursos->currentPage(), 'p2' => $users->currentPage()])->links() }}
  
<!-- tabla Usuarios -->
<h2>Tabla Usuarios</h2>
<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Usuario</th>
            <th scope="col">Email</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
         <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
          </tr> 
        @endforeach         
        </tbody>
  </table>

  <!-- paginacion-->
  {{ $users->appends(['p1' => $cursos->currentPage(), 'p2' => $users->currentPage()])->links() }}

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
      