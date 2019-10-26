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
 
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
    
    <!-- Font Awesome LOCAL -->
    <link href="{{ asset('fontawesome-free-5.8.1-web/css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.8.1-web/css/brands.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome-free-5.8.1-web/css/solid.css') }}" rel="stylesheet">
  <style>
      .pagination {
                    justify-content: center;
                 }
  </style>
  
</head>

<body>
<h1 class="text-center">Listado de Cursos</h1>
<!-- btn crear -->

<a href="{{ route('form-basico.create') }}">
        <button type="button" class="btn btn-success">Crear</button>
</a>
<br><br>

<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">titulo</th>
            <th scope="col">destacado</th>
            <th scope="col">Comandos</th>
          </tr>
        </thead>
        <tbody>
        @foreach ($cursos as $curso)
         <tr>
            <th scope="row">{{ $curso->id }}</th>
            <td>{{ $curso->titulo }}</td>
            <td>{{ $curso->destacado }}</td>
            <td>
                <a href="{{ route('form-basico.show', ['id' => $curso->id ]) }}" title="Ver"><i class="fas fa-eye"></i></a>
                <a href="{{ route('form-basico.edit', ['id' => $curso->id ]) }}" title="Editar"><i class="fas fa-edit"></i></a>
                <a href="" title="Borrar"
                    onclick="event.preventDefault();
                    document.getElementById('form{{ $curso->id }}').submit();"
                 ><i class="fas fa-trash-alt"></i></a>
                
                <!-- boton de borrar -->
                <form id="form{{ $curso->id }}" action="{{ route('form-basico.destroy', $curso->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                 </form>
            </td>
          </tr> 
        @endforeach         
        </tbody>
  </table>

      <!-- paginacion-->
      {{ $cursos->links() }}

      <p> Total de items: {{ $cursos->total() }}</p>

      @if (session('report'))
          <h1>{{ session('report') }}</h1>
      @endif             

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
      