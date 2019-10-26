<!-- seccion de bloque -->
@extends('cursos/capas/template-admin')

@section('admin-content')

 <h2>Comentarios</h2>
 <hr>
 <h4>Listado de Comentarios por Cursos</h4>
 
  
        
    <!-- lista de Comentarios -->
    <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Curso</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Comandos</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($cursos as $curso)
                <tr>
                    <th scope="row">{{ $curso->id }}</th>
                    <td>{{ $curso->titulo }}</td>
                    <td>{{ $curso->comentarios()->count() }}</td>
                    <td>
                        <a href="{{ route('admin-comentarios.show', $curso->id ) }}" title="Ver"><i class="fas fa-eye"></i></a>
                    </td>
                  </tr>      
              @endforeach
            </tbody>
          </table>
          <!-- Paginacion -->
          {{ $cursos->links() }}

@endsection

<!-- secciones para poner texto especifico -->
@section('titulo', 'Comentario')
<!-- resaltar -->
@section('class-active-4','active')