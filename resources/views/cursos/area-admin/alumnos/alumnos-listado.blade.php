<!-- seccion de bloque -->
@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h2>Alumnos Registrados</h2>
 <hr>
 <!-- Btn crear nuevo usuario -->
 <nav aria-label="Page navigation">
        <ul class="pagination justify-content-end">
            <li>
                    <a href="{{ route('admin-alumnos.create') }}" title="Ver">
                        <button type="button" class="btn btn-primary">Nuevo Alumno</button>
                    </a>
            </li>
        </ul>
 </nav>
    
 <!-- lista de usuarios Administrativos -->
 <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Cursos</th>
            <th scope="col">Comandos</th>
          </tr>
        </thead>
        <tbody>  
            @foreach ($alumnos as $alumno)
              <tr>
                  <th scope="row">{{ $alumno->id }}</th>
                  <td>{{ $alumno->name }}</td>
                  <td>{{ $alumno->email }}</td>
                  <td>{{ $alumno->cursos->count() }}</td>
                  <td>
                      <a href="{{ route('admin-alumnos.show', $alumno->id ) }}" title="Ver"><i class="fas fa-eye"></i></a>
                      <a href="{{ route('admin-alumnos.edit', $alumno->id ) }}" title="Editar"><i class="fas fa-edit"></i></a>
                      <!-- boton de borrar -->
                      <a href="" title="Borrar"
                      onclick="
                        // micro codigo JavaScrip
                        event.preventDefault();
                        if(confirm('Seguro de Eliminar'))
                        {
                          document.getElementById('form{{ $alumno->id }}').submit();
                        }
                      "
                      title="Borrar">
                          <i class="fas fa-trash-alt"></i>
                      </a>
                      <!--form de borrar -->
                      <form id="form{{ $alumno->id }}" action="{{ route('admin-alumnos.destroy', $alumno->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                      </form>  
                    </td>
                </tr>
         @endforeach

        </tbody>
      </table>
      <!-- Paginacion -->
      {{ $alumnos->links() }}
@endsection

<!-- secciones para poner texto especifico -->
@section('titulo', 'Alumnos')
<!-- resaltar -->
@section('class-active-2','active')
    

    
