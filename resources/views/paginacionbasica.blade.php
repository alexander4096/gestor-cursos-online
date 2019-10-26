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
      {{ $cursos->links() }}

  <h1 class="text-center">Paginador Instancia Metodos</h1>
  <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">Metodo</th>
              <th scope="col">Explicacion</th>
              <th scope="col">Valor</th>
            </tr>
          </thead>
          <tbody>
           <tr>
              <td> $cursos->count() </td>
              <td>Muestra el total de items de la pagina actual</td>
              <td>{{ $cursos->count() }}</td>
            </tr> 
            <tr>
                <td> $cursos->currentPage() </td>
                <td>indica el numero de la pagina actual</td>
                <td>{{ $cursos->currentPage() }}</td>
            </tr>
            <tr>
                <td> $cursos->firstItem() </td>
                <td>Muesra el total de items pasados por pagina + 1</td>
                <td>{{ $cursos->firstItem() }}</td>
            </tr>
            <tr>
                <td> $cursos->hasMorePages() </td>
                <td>boolean : 1 si hay mas items para paginar, False no hay mas items </td>
                <td>{{ $cursos->hasMorePages() }}</td>
            </tr>
            <tr>
                <td> $cursos->lastItem() </td>
                <td>Muestra el Total los items de cada pagina que se ha pasado y la actual</td>
                <td>{{ $cursos->lastItem() }}</td>
            </tr>
            <tr>
                <td> $cursos->lastPage() </td>
                <td>Nos indica el numero de la ultima pagina</td>
                <td>{{ $cursos->lastPage() }}</td>
            </tr>
            <tr>
                <td> $cursos->nextPageUrl() </td>
                <td>Indica el URL para la proxima pagina</td>
                <td>{{ $cursos->nextPageUrl() }}</td>
            </tr>
            <tr>
                <td> $cursos->onFirstPage() </td>
                <td>boolean: 1 si esta en la primera pagina, False otras paginas</td>
                <td>{{ $cursos->onFirstPage() }}</td>
            </tr>
            <tr>
                <td> $cursos->perPage() </td>
                <td>Muestra el numero de items a mostrar por pagina</td>
                <td>{{ $cursos->perPage() }}</td>
            </tr>
            <tr>
                <td> $cursos->previousPageUrl() </td>
                <td>Muestra el URL de la pagina previa</td>
                <td>{{ $cursos->previousPageUrl() }}</td>
            </tr>
            <tr>
                <td> $cursos->total() </td>
                <td>nuestra el total de items que tiene la consulta</td>
                <td>{{ $cursos->total() }}</td>
            </tr>
            <tr>
                <td> $cursos->url($page) </td>
                <td>Muestra el URL de una pagina en especifico: Ej para la pagina 1: $cursos->url(1)</td>
                <td>{{ $cursos->url(1) }}</td>
            </tr>
            <tr>
                <td> $cursos->getUrlRange($start, $end) </td>
                <td>Crea un array de URL de un rango de paginacion: Ej para crear url de la pagina 1 a 3: getUrlRange(1, 3)</td>
                <td><?php print_r($cursos->getUrlRange(1, 3)) ?></td>
            </tr>
          </tbody>
    </table>


  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>
      