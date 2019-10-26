<!-- seccion de bloque -->
@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h1>Cursos</h1>
 <hr>
 <h2 style="background-color: darkgrey">Editar Cursos</h2>

 <!-- se pasa el id desde la vista por una session -->
 @php
  (session(['id' => $curso->id ]))
 @endphp
 {{ session('id') }}

   <!-- bloque form de register -->
   <form method="POST" action="{{ route('admin-cursos.update',['id' => $curso->id ]) }}">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="titulo" class="col-md-4 col-form-label text-md-left">Titulo</label>
            <div class="col-md-12">
            <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $curso->titulo }}" autofocus>
            </div>
        </div>
        
        <div class="form-group">
                <label for="exampleFormControlTextarea1">Breve Descripcion</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion">{{ $curso->descripcion }}</textarea>
        </div>
      
        <div class="form-check">
                <!-- marcar producto destacado -->
                @php
                    $destacado = ($curso->destacado==1 )? "checked" : ""; 
                @endphp
                <input class="form-check-input" type="checkbox" {{ $destacado }}  id="defaultCheck1" name="destacado">
                <label class="form-check-label" for="defaultCheck1">
                 Mostrar en Galeria Carrusel
                </label>
        </div>
        
        <br>
        <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion Larga</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="detalle">{{ $curso->detalle }}</textarea>
        </div>

        <!-- grupo de botones para editar curso -->
        <div class="form-group row mb-0">
               
                  <div class="col-md-2 offset-md-10">
                      <button type="submit" class="btn btn-primary">
                          ACTUALIZAR
                      </button>
                  </div>
         </div>
         <br>

        {{--  Reporte de actualizar curso --}}
        @if (session('report'))
                <h3>{{ session('report') }}</h3>
        @endif

    </form>
    <!-- fin de form -->

    <!-- lista de materiales del curso -->
    <h2 style="background-color: darkgrey">Listado de Material [ {{ $curso->material->count() }} ]</h2>
 
        <!-- Btn crear nuevo Material -->
        <nav aria-label="Page navigation">
                <ul class="pagination justify-content-end">
                        <li>
                        <a href="{{ route('admin-Material.create') }}" title="Nueva Materia">
                                <button type="button" class="btn btn-primary">Nuevo Material</button>
                        </a>
                        </li>
                </ul>
        </nav>
    <!-- lista de Cursos -->
    <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Titulo</th>
                <th scope="col">Url Material</th>
                <th scope="col">Comandos</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($materiales as $material)
                        <tr>
                                <th scope="row">{{ $material->id }}</th>
                                <td>{{ $material->titulo }}</td>
                                <td>{{ $material->url_material }}</td>
                                <td>
                                        <a href="{{ route('admin-Material.show', $material->id) }}" title="Ver"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin-Material.edit', $material->id) }}" title="Editar"><i class="fas fa-edit"></i></a>
                                                        <!-- boton de borrar -->
                                                                <a href="" title="Borrar"
                                                                onclick="
                                                                // micro codigo JavaScrip
                                                                event.preventDefault();
                                                                if(confirm('Seguro de Eliminar'))
                                                                {
                                                                document.getElementById('form{{ $material->id }}').submit();
                                                                }
                                                                "
                                                                title="Borrar">
                                                                <i class="fas fa-trash-alt"></i>
                                                        </a>
                                                        <!--form de borrar -->
                                                        <form id="form{{ $material->id }}" action="{{ route('admin-Material.destroy', $material->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                        </form>
                                </td>
                        </tr>  
                @endforeach  
            </tbody>
          </table>
          <!-- Paginacion Material -->
          {{ $materiales->appends(['p1' => $materiales->currentPage(), 'p2' => $galeriafotos->currentPage()])->links() }}

    
    <!-- listado de fotos -->
    <h2 style="background-color: darkgrey">Listado de Fotos [ {{ $curso->galeriafotos->count() }} ]</h2>
    <p class="text-right">
                <a href="{{ route('admin-fotos.create') }}" title="">
                        <button type="button" class="btn btn-primary">Nueva Foto</button>
                </a>
    </p>
        

    <div class="row">
        @foreach ($galeriafotos as $foto)
                @php
                        // cargar url_fotos;
                        $imagen= $foto->url_fotos;
                        // poner ruta /img/ donde esta la foto
                        $imagen= '/img/' . $imagen;
                @endphp  
                <div class="col-lg-3 portfolio-item">
                        <div class="card h-100">
                           <img class="card-img-top" src="{{ asset($imagen) }}" alt="" title="{{ $foto->titulofotos }}">  
                           <p style="text-align: right; padding: 10px;">
                                        <a href="{{ route('admin-fotos.edit', $foto->id) }}" title="Editar"><i class="fas fa-edit"></i></a>
                                        <!-- boton de borrar -->
                                        <a href="" title="Borrar"
                                                onclick="
                                                // micro codigo JavaScrip
                                                event.preventDefault();
                                                if(confirm('Seguro de Eliminar'))
                                                {
                                                document.getElementById('form{{ $foto->id }}').submit();
                                                }
                                                "
                                                title="Borrar">
                                                <i class="fas fa-trash-alt"></i>
                                        </a>
                                        <!--form de borrar -->
                                        <form id="form{{ $foto->id }}" action="{{ route('admin-fotos.destroy', $foto->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                        </form>
                           </p>  
                        </div>
                </div>
        @endforeach
    </div>

     <!-- Paginacion Fotos -->
     {{ $galeriafotos->appends(['p1' => $materiales->currentPage(), 'p2' => $galeriafotos->currentPage()])->links() }}

     <!-- Diploma -->
     <h2 style="background-color: darkgrey">Diploma</h2>
     <p class="text-right">
                <a href="{{ route('admin-diploma.create') }}" title="">
                        <button type="button" class="btn btn-primary">Nuevo Diploma</button>
                </a>
     </p>
        @php
                // cargar url_fotos;
                if(isset($curso->diploma->url_diploma)) {
                        $imagen= $curso->diploma->url_diploma;
                        // poner ruta /img/ donde esta la foto
                        $imagen= '/diploma/' . $imagen;
                } else {
                        $imagen= '/img/' . 'ImagenNoDisponible.jpg';
                }                
        @endphp 
        @isset($curso->diploma->id )
        <div class="col-lg-10 offset-1 portfolio-item">
                        <div class="card h-100">
                        <a href=""><img class="card-img-top" src="{{ asset($imagen) }}" alt=""></a>
                        </div>
                        <p style="text-align: right; padding: 10px;">
                                    <a href="{{ route('admin-diploma.edit', $curso->diploma->id ) }}" title="Editar"><i class="fas fa-edit"></i></a>                 
                                    <!-- boton de borrar -->
                                    <a href="" title="Borrar"
                                            onclick="
                                            // micro codigo JavaScrip
                                            event.preventDefault();
                                            if(confirm('Seguro de Eliminar'))
                                            {
                                            document.getElementById('form{{ $curso->diploma->id }}').submit();
                                            }
                                            "
                                            title="Borrar">
                                            <i class="fas fa-trash-alt"></i>
                                    </a>
                                    <!--form de borrar -->
                                    <form id="form{{ $curso->diploma->id }}" action="{{ route('admin-diploma.destroy', $curso->diploma->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                    </form>     
                        </p>           
        </div>
        @endisset   
  

    <p class="text-right">
            <a href="{{ route('admin-cursos.index') }}" title="Nuevo Curso">
                    <button type="button" class="btn btn-primary">Retornar -></button>
            </a>
     </p>

@endsection

<!-- secciones para poner texto especifico -->
@section('titulo', 'Cursos')
<!-- resaltar -->
@section('class-active-3','active')
  