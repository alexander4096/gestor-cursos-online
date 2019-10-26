<!-- seccion de bloque -->
@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h2>Cursos</h2>
 <hr>
 <h4>Crear Cursos</h4>
 
   <!-- se copia el bloque form de register -->
    <form method="POST" action="{{ route('admin-cursos.store') }}">
        @csrf

        <div class="form-group row">
            <label for="titulo" class="col-md-4 col-form-label text-md-left">Titulo</label>
            <div class="col-md-12">
                <input id="titulo" type="text" class="form-control {{ $errors->has('titulo') ? ' is-invalid' : '' }}" name="titulo" value="{{ old('titulo') }}" autofocus>
            </div>
        </div>
        
        <div class="form-group">
                <label for="exampleFormControlTextarea1">Breve Descripcion</label>
                <textarea class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}" id="exampleFormControlTextarea1" rows="3" name="descripcion">{{ old('descripcion') }}</textarea>
        </div>
      
        <div class="form-check">
                <input class="form-check-input" type="checkbox" id="defaultCheck1" name="destacado">
                <label class="form-check-label" for="defaultCheck1">
                 Mostrar en Galeria Carrusel
                </label>
        </div>
        
        <br>
        <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion Larga</label>
                <textarea class="form-control {{ $errors->has('detalle') ? ' is-invalid' : '' }}" id="exampleFormControlTextarea1" rows="3" name="detalle">{{ old('detalle') }}</textarea>
        </div>

       <!-- boton de registrar -->
        <div class="form-group row mb-0">
            <div class="col-md-2 offset-md-10">
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

    {{-- muestra aviso de error en validacion --}}
    @if ($errors->any())
    <div class="">
        <h5>Listado de Errores en Validacion</h5>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

@endsection

<!-- secciones para poner texto especifico -->
@section('titulo', 'Cursos')
<!-- resaltar -->
@section('class-active-3','active')
  