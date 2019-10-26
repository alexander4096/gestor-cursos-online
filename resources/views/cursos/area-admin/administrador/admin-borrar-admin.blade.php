@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h2 style="margin-top: 10px; margin-bottom: 50px;">BORRAR USUARIO ADMINISTRADOR</h2>

  <!-- se copia el bloque form de register -->
 <form method="POST" action="">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" readonly>

                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" readonly>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

       
        <div class="form-group row mb-0">
            <div class="col-md-4 offset-md-8">
                <a href="{{ url('/admin-admin') }}">
                    <button type="button" class="btn btn-primary">
                            <- Regresar
                    </button>
                </a>
                    <button type="button" class="btn btn-danger">
                            Borrar
                    </button>
            </div>
        </div>
    </form>
@endsection

 <!-- secciones para poner texto especifico -->
 @section('titulo', 'Crear Administrador')
 <!-- resaltar -->
 @section('class-active-1','active')
     