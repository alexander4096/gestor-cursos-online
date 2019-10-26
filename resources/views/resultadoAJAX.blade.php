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
            <td><a href="{{ url('AjaxEditar/'. $curso->id .'/editar') }}"><button>Editar</button></a></td>
            <td>
                <!-- boton de borrar -->
                <form id="form{{ $curso->id }}" action="{{ url('AjaxEliminar/' . $curso->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="" title="Borrar" class="btn-delete"><button>Borrar</button></a>
                </form>
            </td>
          </tr> 
        @endforeach         
        </tbody>
  </table>

<!-- paginacion-->
{{ $cursos->links() }}