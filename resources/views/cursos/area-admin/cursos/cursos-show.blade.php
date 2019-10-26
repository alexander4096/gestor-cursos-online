<!-- seccion de bloque -->
@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h1>Cursos</h1>
 <hr>
 <h2 style="background-color: darkgrey">Ver Cursos</h2>
 
   <!-- se copia el bloque form de register -->
   <form method="POST" action="">
        @csrf

        <div class="form-group row">
            <label for="titulo" class="col-md-4 col-form-label text-md-left">Titulo</label>
            <div class="col-md-12">
            <input id="titulo" type="text" class="form-control" name="titulo" value="{{ $curso->titulo }}" required autofocus readonly>
            </div>
        </div>
        
        <div class="form-group">
                <label for="exampleFormControlTextarea1">Breve Descripcion</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{ $curso->descripcion }}</textarea>
        </div>
      
        <div class="form-check">
                <!-- marcar producto destacado -->
                @php
                    $destacado = ($curso->destacado==1 )? "checked" : ""; 
                @endphp
                <input class="form-check-input" type="checkbox" {{ $destacado }}  id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                 Mostrar en Galeria Carrusel
                </label>
        </div>
        
        <br>
        <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion Larga</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{ $curso->detalle }}</textarea>
        </div>

    <!-- lista de materiales del curso -->
    <h2 style="background-color: darkgrey">Listado de Material [ {{ $curso->material->count() }} ]</h2>
 
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
                                    <a href="{{ route('admin-Material.show', $material->id ) }}"><i class="fas fa-eye"></i></a>
                                </td>
                        </tr>  
                @endforeach  
            </tbody>
          </table>
          <!-- Paginacion Material -->
          {{ $materiales->appends(['p1' => $materiales->currentPage(), 'p2' => $galeriafotos->currentPage()])->links() }}
    
    </form>
    
    <!-- listado de fotos -->
    <h2 style="background-color: darkgrey">Listado de Fotos [ {{ $curso->galeriafotos->count() }} ]</h2>
    
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
                        </div>
                </div>
        @endforeach
    </div>

     <!-- Paginacion Fotos -->
     {{ $galeriafotos->appends(['p1' => $materiales->currentPage(), 'p2' => $galeriafotos->currentPage()])->links() }}

     <!-- Diploma -->
     <h2 style="background-color: darkgrey">Diploma</h2>
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
     <div class="col-lg-10 offset-1 portfolio-item">
            <div class="card h-100">
            <a href=""><img class="card-img-top" src="{{ asset($imagen) }}" alt=""></a>
            </div>         
     </div>

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
  