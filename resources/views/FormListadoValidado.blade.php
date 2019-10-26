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
<h2>Ejemplo de Validacion</h2>
<br>
<a href="{{ url('validacion-formulario/create') }}"><button>Crear Usuario</button></a>
<br><br>
<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">name</th>
            <th scope="col">email</th>
            <th scope="col">control</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($User_admins as $User_admin)
         <tr>
            <th scope="row">{{ $User_admin->id }}</th>
            <td>{{ $User_admin->name }}</td>
            <td>{{ $User_admin->email }}</td>
            <td><a href="{{ url('validacion-formulario/'. $User_admin->id .'/edit') }}" title="Editar"><button>Edit</button></a></td>
          </tr> 
        @endforeach         
        </tbody>
  </table>

    <!-- paginacion-->
    {{ $User_admins->links() }}

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
      