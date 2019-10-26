<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <!-- Bootstrap core CSS  -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

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
<div class="container">
<div class="col-md-10 offset-1">
    <h1>CRUD</h1>
    <a href="{{ route('myDemoCRUD.create') }}">
            <button type="button" class="btn btn-success">Crear</button>
    </a>
    <br><br>

            <table class="table table-striped">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">nombre</th>
                        <th scope="col">edad</th>
                        <th scope="col">email</th>
                        <th scope="col">Controles</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($dates as $date)
                        <tr>
                        <th scope="row">{{ $date->id }}</th>
                        <td>{{ $date->nombre }}</td>
                        <td>{{ $date->edad }}</td>
                        <td>{{ $date->email }}</td>
                        <td>
                            <a href="{{ route('myDemoCRUD.show', ['id' => $date->id ]) }}" title="Ver"><i class="fas fa-eye"></i></a>
                            <a href="{{ route('myDemoCRUD.edit', ['id' => $date->id ]) }}" title="Editar"><i class="fas fa-edit"></i></a>
                            <a href="" title="Borrar"
                                onclick="event.preventDefault();
                                document.getElementById('form{{ $date->id }}').submit();"
                                ><i class="fas fa-trash-alt"></i></a>
                            
                            <!-- boton de borrar -->
                            <form id="form{{ $date->id }}" action="{{ route('myDemoCRUD.destroy', $date->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                </form>
                        </td>
                        </tr> 
                    @endforeach         
                    </tbody>
                </table>
        
              <!-- paginacion-->
              {{ $dates->links() }}
        
              <p> Total de items: {{ $dates->total() }}</p>
        
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