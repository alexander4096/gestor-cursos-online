@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h2 style="margin-top: 10px; margin-bottom: 50px;">CREAR NUEVA FOTO</h2>
@php
 $id=request()->session()->get('id');
@endphp
<h3>ID: {{ $id }}</h3>

  <!-- se copia el bloque form de register -->
  <form method="POST" action="{{ route('admin-fotos.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Titulo Foto</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="titulofotos" value="" required autofocus>               
            </div>
        </div>

        <h5>Subir fotos jpg</h5>
        <div class="form-group">
                <label for="file">Subir Archivo a la ruta /public/upload</label>
                <input type="file" class="form-control" name="file" id="file">
        </div>
        
        <input type="hidden" name="id_cursos" value="{{ $id }}">

        <div class="form-check">
                <input class="form-check-input" type="checkbox" id="defaultCheck1" name="checkgaleria">
                <label class="form-check-label" for="defaultCheck1">
                 Mostrar en Galeria Carrusel
                </label>
        </div>
       
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
 @section('titulo', 'Cursos / Fotos Galeria')
 <!-- resaltar -->
 @section('class-active-3','active')
     