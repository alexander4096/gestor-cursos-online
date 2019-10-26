<!-- seccion de bloque -->
@extends('cursos/capas/template-admin')

@section('admin-content')

 <h2>Cursos</h2>
 <hr>
 <h4>Listado de Cursos Creados</h4>
 
    <!-- Btn crear nuevo Curso -->
    <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end">
                <li>
                        <a href="{{ route('admin-cursos.create') }}" title="Nuevo Curso">
                            <button type="button" class="btn btn-primary">Nuevo Curso</button>
                        </a>
                </li>
            </ul>
    </nav>
    
    <!-- listado de cursos -->
    <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Destacado</th>
                <th scope="col">Material</th>
                <th scope="col">Fotos</th>
                <th scope="col">Diploma</th>
                <th scope="col">Comandos</th>
              </tr>
            </thead>
            <tbody>
            @foreach ($cursos as $curso)
            <tr>
                <th scope="row">{{ $curso->id }}</th>
                <td>{{ $curso->titulo }}</td>
                <!-- para destacados -->
                @if ($curso->destacado)
                    <td align="center" style="color:green">Si</td>
                @else
                    <td align="center" style="color:red">No</td>
                @endif          
                <td align="right">{{ $curso->material->count() }}</td>
                <td align="right">{{ $curso->galeriafotos->count() }}</td>
                <!-- diploma si el url tiene extension jpg es TRUE -->
                @if (isset($curso->diploma->url_diploma))
                    @php
                        $filename = $curso->diploma->url_diploma;
                    @endphp
                    @if(preg_match("/\.(gif|png|jpg)$/", $filename))
                        <td align="center" style="color:green">Si</td>
                    @else
                        <td align="center" style="color:red">No</td>
                    @endif
                @else 
                      <td align="center" style="color:green">empty</td>
                @endif
                <td align="left">
                     <a href="{{ route('admin-cursos.show', $curso->id ) }}" title="Ver"><i class="fas fa-eye"></i></a>
                     <a href="{{ route('admin-cursos.edit', $curso->id ) }}" title="Editar"><i class="fas fa-edit"></i></a>
                     <!-- boton de borrar -->
                        <a href="" title="Borrar"
                                onclick="
                                // micro codigo JavaScrip
                                event.preventDefault();
                                if(confirm('Seguro de Eliminar'))
                                {
                                    document.getElementById('form{{ $curso->id }}').submit();
                                }
                                "
                                title="Borrar">
                                <i class="fas fa-trash-alt"></i>
                        </a>
                        <!--form de borrar -->
                        <form id="form{{ $curso->id }}" action="{{ route('admin-cursos.destroy', $curso->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                        </form>
                </td>
              </tr>   
            @endforeach
              
            </tbody>
          </table>
          <!-- Paginacion -->
          {{ $cursos->links() }}

@endsection

<!-- secciones para poner texto especifico -->
@section('titulo', 'Cursos')
<!-- resaltar -->
@section('class-active-3','active')