@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h2 style="margin-top: 10px; margin-bottom: 50px;">EDITAR DIPLOMA</h2>
    @php
    // viene desde curso
    $id=request()->session()->get('id');
    @endphp
    <h3>ID: {{ $id }}</h3>

  <!-- form de diploma -->
 <form method="POST" action="{{  route('admin-diploma.update',['id' => $Diploma->id ]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <h5>Subir diploma en jpg</h5>
        <div class="form-group">
                <label for="file">Subir Archivo a la ruta /public/diploma: </label>
                <h3><span style="background: orange;"> Actual: </span> {{ $Diploma->url_diploma }}</h3>
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
 @section('titulo', 'Cursos / Diploma')
 <!-- resaltar -->
 @section('class-active-3','active')
     