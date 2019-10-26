@extends('cursos/capas.ppal') 
@section('cuerpo')

  <!-- Page Content -->
  <div class="container">

<!-- muestra el usuario logueado  cuenta Users -->
 @if (Auth::check())
     @php
         $nombreUsuario=Auth::user()->name;
     @endphp
@else
    @php
         $nombreUsuario='';
    @endphp
@endif

<!-- direcciona si hay usuario registrado -->
@if (Auth::check())
      <!-- si ingreso un usuario --> 
          <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Cursos Registrados por el Alumno <br> <small>{{ $nombreUsuario }}</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        Cursos Registrados: {{ $cursos->total() }}
      </li>   
    </ol>

    @foreach ($cursos as $curso)
        <!-- Blog Post -->
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                  @php
                    if(isset($curso->galeriafotos()->first()->url_fotos)) {
                        // cargar el primer item de atributo url_fotos;
                        $foto= $curso->galeriafotos()->first()->url_fotos;
                        // poner ruta /img/ donde esta la foto
                        $foto= '/img/' . $foto;
                    } else {
                        // Si no hay foto (galariafotos)
                        $foto= '/img/' . 'ImagenNoDisponible.jpg';
                    }
                  @endphp     
                <a href="{{ url('/items-del-curso/'. $curso->id ) }}">
                <img class="img-fluid rounded" src="{{ $foto }}" alt="">
                </a>
              </div>
              <div class="col-lg-6">
                <h2 class="card-title">{{ $curso->titulo }}</h2>
                <p class="card-text">{{ str_limit($curso->descripcion,100,'...') }}</p>
                <a href="{{ url('/items-del-curso/'. $curso->id) }}" class="btn btn-primary">Leer mas &rarr;</a>
              </div>
            </div>
          </div>
          <div class="card-footer text-muted">
            @php
              $id_user = Auth::user()->id;
              $id_curso = $cursos->first()->id; 
              session(['id_user' => $id_user ]);
              session(['id_curso' => $id_curso ]);
            @endphp
             N# {{ $curso->id }} Id_user: {{ $id_user }} Id_curso: {{ $id_curso }}
             <br>
          </div>
        </div>
    @endforeach
    <!-- Pagination -->
    {{ $cursos->links() }}
  
@else
     <!-- no ingreso a un usuario -->
     <center><h1> DEBE INGRESAR UN USUARIO ALUMNO </h1></center>
@endif
  
  </div>
  <!-- /.container -->

  @endsection