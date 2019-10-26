@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h2 style="margin-top: 10px; margin-bottom: 50px;">CREAR NUEVO MATERIAL</h2>
 @php
   $id=request()->session()->get('id');
 @endphp
 <h3>ID: {{ $id }}</h3>
 <h3>Contenido</h3>

  <!--  form de register -->
  <form method="POST" action="{{ route('admin-Material.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Titulo</label>

            <div class="col-md-12">
                <input id="name" type="text" class="form-control" name="titulo" value="" required autofocus>               
            </div>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion del Material</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="descripcion"></textarea>
        </div>
      
        <h5>Subir videos en formato mp4 y fotos jpg</h5>
        <div class="form-group">
                <label for="file">Subir Archivo a la ruta /public/upload</label>
                <input type="file" class="form-control" name="file" id="file">
        </div>
        
        <input type="hidden" name="id_curso" value="{{ $id }}">
        <br>

        <div class="form-group row mb-0">
                <div class="col-md-4 offset-md-8">
                    <button type="submit" class="btn btn-primary">
                        Registrar
                    </button>
                </div>
        </div>
       
    </form>

    <!-- notificacion de grabado -->
    @if (Session::has('notificacion'))
         <h5>{{ Session::get('notificacion') }}</h5>
    @endif

    <p class="text-right">
            <a href="{{ route('admin-cursos.edit', $id) }}" title="">
                    <button type="button" class="btn btn-info">Retornar -></button>
            </a>
     </p>

@endsection

 <!-- secciones para poner texto especifico -->
 @section('titulo', 'Cursos / Materiales')
 <!-- resaltar -->
 @section('class-active-3','active')
     