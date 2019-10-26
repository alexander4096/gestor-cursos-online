<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title></title>
    <!-- Bootstrap core CSS  -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
</head>

<body>
<div class="container-fluid">
 <div class="row">
     <div class="col-md-12">
     <h1 class="text-center">EDITAR USUARIOS N# {{ $admin->id }}</h1>
<!-- se copia el bloque form de register -->
<form method="POST" action="{{ route('validacion-formulario.update', $admin->id ) }}" id="formulario">
        @csrf
        @method('PUT')
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control  {{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name', $admin->name) }}">
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                <div class="col-md-6">
                    <input id="email" type="text" class="form-control  {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email',$admin->email) }}">
                </div>
            </div>
    
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
    
                <div class="col-md-6">
                <input id="password" type="password" class="form-control  {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ old('password') }}">
                </div>
            </div>
    
            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Password</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control  {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" value="{{ old('password_confirmation') }}">
                </div>
            </div>
    
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Editar
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

</div>
</div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>
</html>