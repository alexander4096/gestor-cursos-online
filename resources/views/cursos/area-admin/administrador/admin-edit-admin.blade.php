@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h2 style="margin-top: 10px; margin-bottom: 50px;">EDITAR USUARIO ADMINISTRADOR</h2>

  <!-- se copia el bloque form de register -->
  <form method="POST" action="{{ url('/admin-edit-admin/' . $admin->id .'') }}">
        @csrf
        @method('PUT')
        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ $admin->name }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ $admin->email }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control" name="password" value="">
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Password</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="">
            </div>
        </div>

        <!-- notificacion editado -->
        @if (Session::has('notificacion'))
            <h5>{{ Session::get('notificacion') }}</h5>
        @endif

        <div class="form-group row mb-0">
            <div class="col-md-2 offset-md-10">
                <button type="submit" class="btn btn-primary">
                    ACTUALIZAR
                </button>
            </div>
        </div>
    </form>
@endsection

 <!-- secciones para poner texto especifico -->
 @section('titulo', 'Crear Administrador')
 <!-- resaltar -->
 @section('class-active-1','active')
     