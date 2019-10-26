<!-- seccion de bloque -->
@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h2>ADMIN ADMIN</h2>
 <hr>
 <!-- Btn crear nuevo usuario -->
 <nav aria-label="Page navigation">
        <ul class="pagination justify-content-end">
            <li>
                    <a href="{{ url('/admin-crear-admin') }}" title="Ver">
                        <button type="button" class="btn btn-primary">Nuevo Admin</button>
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
            <th scope="col">Comandos</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($admins as $admin)
        <tr>
            <th scope="row">{{ $admin->id }}</th>
            <td>{{ $admin->name }}</td>
            <td>{{ $admin->email }}</td>
            <td>
                 <a href="{{ url('/admin-ver-admin/'. $admin->id ) }}" title="Ver"><i class="fas fa-eye"></i></a>
                 <a href="{{ url('/admin-edit-admin/'. $admin->id ) }}" title="Editar"><i class="fas fa-edit"></i></a>
                 <!-- boton de borrar -->
                 <a href="" title="Borrar"
                      onclick="
                        // micro codigo JavaScrip
                        event.preventDefault();
                        if(confirm('Seguro de Eliminar'))
                        {
                          document.getElementById('form{{ $admin->id }}').submit();
                        }
                     "
                      title="Borrar">
                      <i class="fas fa-trash-alt"></i>
                  </a>
                  <!--form de borrar -->
                  <form id="form{{ $admin->id }}" action="{{ url('/admin-borrar-admin/'. $admin->id .'') }}" method="POST">
                      @csrf
                      @method('DELETE')
                  </form>
            </td>
          </tr>
        @endforeach

        </tbody>
      </table>
      <!-- Pagination -->
      {{ $admins->links() }}
      

@endsection

<!-- secciones para poner texto especifico -->
@section('titulo', 'Administrador')
<!-- resaltar -->
@section('class-active-1','active')
    

    
