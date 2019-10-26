@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h2 style="margin-top: 10px; margin-bottom: 50px;">CREAR DIPLOMA</h2>
 @php
 $id=request()->session()->get('id');
 @endphp
 <h3>ID: {{ $id }}</h3>

  <!-- form para registrar diploma -->
 <form method="POST" action="{{ route('admin-diploma.store') }}" enctype="multipart/form-data">
        @csrf

        <br>

        <h5>Subir fotos jpg</h5>
        <div class="form-group">
                <label for="file">Subir Archivo a la ruta /public/upload</label>
                <input type="file" class="form-control" name="file" id="file">
        </div>
        
        <input type="hidden" name="id_curso" value="{{ $id }}">

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
 @section('titulo', 'Cursos / Diploma')
 <!-- resaltar -->
 @section('class-active-3','active')
     