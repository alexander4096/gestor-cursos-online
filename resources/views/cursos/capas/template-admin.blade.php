@extends('cursos/capas.ppal') 
@section('cuerpo')

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Menu principal del Administrador
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ url('/admin-index') }}">Inicio</a>
      </li>
      <li class="breadcrumb-item active">@yield('titulo')</li>
    </ol>

    <!-- Content Row -->
    <div class="row">
      <!-- Sidebar Column -->
      <div class="col-lg-3 mb-4">
        <div class="list-group">
          <a href="{{ url('/admin-admin') }}" class="list-group-item @yield('class-active-1')">Administrador</a>
          <a href="{{ url('/admin-alumnos') }}" class="list-group-item @yield('class-active-2')">Alumnos</a>
          <a href="{{ url('/admin-cursos') }}" class="list-group-item @yield('class-active-3')">Cursos</a>
          <a href="{{ url('/admin-comentarios') }}" class="list-group-item @yield('class-active-4')">Comentarios</a>
        </div>
      </div>
      <!-- Area de contenido Administrador -->
      <div class="col-lg-9 mb-4">
        @yield('admin-content')
      </div>
      <!-- / Area de contenido Administrador -->
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->
  
  


  @endsection