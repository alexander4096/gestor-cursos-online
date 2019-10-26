@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h2 style="margin-top: 10px; margin-bottom: 50px;">EDITAR FOTO</h2>
 @php
    // viene desde curso
    $id=request()->session()->get('id');
 @endphp
 <h3>ID: {{ $id }}</h3>

  <!-- se copia el bloque form de register -->
 
 <form method="POST" action="{{  route('admin-fotos.update',['id' => $Galeriafoto->id ]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Titulo Foto</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="titulofotos" value="{{ $Galeriafoto->titulofotos }}"  autofocus>               
            </div>
        </div>
 
        {{-- para checkgaleria --}}
        <div class="form-check">
            @php
                $checkgaleria = ($Galeriafoto->checkgaleria==1 )? "checked" : ""; 
            @endphp
            <input class="form-check-input" type="checkbox" {{ $checkgaleria }}  id="defaultCheck1" name="checkgaleria">
            <label class="form-check-label" for="defaultCheck1">
             Mostrar en Galeria Carrusel
            </label>
       </div>
       <br>
    
        <h5>Subir videos en formato mp4 y fotos jpg</h5>
        <div class="form-group">
                <label for="file">Subir Archivo a la ruta /public/material-</label>
                <h3><span style="background: orange;"> Actual: </span> {{ $Galeriafoto->url_fotos }}</h3>
                <input type="file" class="form-control" name="file" id="file">
        </div>
        
        {{-- se envia el id_curso para establecer la relacion uno varios --}}
        <input type="hidden" name="id_curso" value="{{ $id }}">
       
        <!-- notificacion editado -->
        @if (Session::has('notificacion'))
            <h5>{{ Session::get('notificacion') }}</h5>
        @endif

        <br>

        <div class="form-group row mb-0">
                <div class="col-md-2 offset-md-4">
                              <button type="submit" class="btn btn-danger">
                                  BORRAR
                              </button>
                  </div>
                  <div class="col-md-2 offset-md-2">
                      <button type="submit" class="btn btn-primary">
                          ACTUALIZAR
                      </button>
                  </div>
         </div>
       
    </form>

    <p class="text-right">
            <a href="{{ route('admin-cursos.edit', $id ) }}" title="">
                    <button type="button" class="btn btn-info">Retornar -></button>
            </a>
     </p>

@endsection

 <!-- secciones para poner texto especifico -->
 @section('titulo', 'Cursos / Fotos Galeria')
 <!-- resaltar -->
 @section('class-active-3','active')
     