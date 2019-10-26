@extends('cursos/capas.ppal') 
@section('cuerpo')

  <!-- Page Content -->
  <div class="container">

    <!-- Titulo de curso -->
    <h1 class="mt-4 mb-3">{{ $curso->titulo }}</h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ url('/listado-cursos') }}">Listado de Cursos</a>
      </li>
    </ol>

    <div class="row">

      <!-- Post Content Column -->
      <div class="col-lg-8">
        @php
              // evita error proterty non-object
              if(isset($curso->galeriafotos()->first()->url_fotos)) {
                  // No es nulo (galariafotos primera foto)
                    // cargar el primer item de atributo url_fotos;
                    $foto= $curso->galeriafotos()->first()->url_fotos;
                    // poner ruta /img/ donde esta la foto
                    $foto= '/img/' . $foto;
              }else{
                  // Si es nulo (galariafotos)
                    $foto= '/img/' . 'ImagenNoDisponible.jpg';
              }
        @endphp   
     
        <!--  Image principal usando el Helper asset para la ruta -->
        <img class="img-fluid rounded" style="width: 100%; height: auto;" src="{{ asset($foto) }}" alt="">

        <hr>
   
        <!-- boton para registrar cursos -->
        <!-- muestra el usuario logueado  cuenta Users -->
        @if (Auth::check())
                <p style="">
                    ID Curso: {{ $curso->id }}
                    ID USER:  {{ Auth::user()->id }} 
                </p>
                @php
                  // valores de id curso y id usuario
                  $var_id_curso = $curso->id;
                  $var_id_user = Auth::user()->id;
                  $registradocurso = DB::table('cursos_users')->where([['id_curso', '=', $var_id_curso],['id_user','=', $var_id_user ]])->get();    
                @endphp
                {{-- si count == 0  no hay curso registrado por el usuario --}}
                @if (count($registradocurso)==0)
                      <!-- no registrado -->
                      <div class="col-md-12">
                            <form method="POST" action="{{ route('RegistrarCursoAlumno') }}">
                                @csrf
                                <input type="hidden" name="id_curso" value="{{ $curso->id }}">
                                <input type="hidden" name="id_user"  value="{{ Auth::user()->id }}">
                                <p style="text-align: right;">
                                    <button type="submit" class="btn btn-primary btn-lg">Registrar Curso</button>
                                </p> 
                          </form>
                      </div>
                @else
                      <!-- registrado -->
                      <div class="col-md-12">
                          <div class="alert alert-success" role="alert">
                             <h4>CURSO REGISTRADO POR EL USUARIO</h4>
                          </div>
                      </div>
                @endif
        @endif
        <!-- fin btn -->


        <!-- Date/Time -->
        <p>Fecha de Creacion: {{ $curso->created_at }}</p>
        <hr>

        <!-- Post Content -->
        <p class="lead">{{ $curso->detalle }}</p>
        <hr>

        <!-- Comments Form -->
        <div class="card my-4">
          <h5 class="card-header">Commentarios sobre el Curso</h5>
        
        </div>
        @foreach ($comentarios as $comentario)
            <!-- Single Comment -->
            <div class="media mb-4">
              <img class="d-flex mr-3 rounded-circle" src="http://lorempixel.com/50/50/" alt="">
              <div class="media-body">
              <h5 class="mt-0">Autor: {{ $comentario->name }}</h5>
              <!-- pivot para llamar al contenido de la tabla pivote -->
              <small>{{ $comentario->pivot->created_at }}</small><br><br>
              <p> {{ $comentario->pivot->comentario }}</p>
              </div>
            </div>
        @endforeach    

      </div>

      <!-- Fotos extras -->
      <div class="col-md-4">

        <!-- Foto extra del curso -->
        <div class="card my-4">
          <h5 class="card-header">Fotos del Curso</h5>
          <div class="card-body">
            <div class="row">
              @foreach ($curso->galeriafotos as $galeriafotos)
              <div class="col-lg-4">
                    @php
                    // cargar el primer item de atributo url_fotos;
                    $foto= $galeriafotos->url_fotos ;
                    // poner ruta /img/ donde esta la foto
                    $foto= '/img/' . $foto;
                    @endphp   
                    <img class="img-fluid rounded" src="{{ asset($foto) }}" alt="">
              </div>
              @endforeach
            </div>
          </div>
        </div>

        <!-- descripcion basica del curso -->
        <div class="card my-4">
          <h5 class="card-header">Resumen del Curso</h5>
          <div class="card-body">
              {{ $curso->descripcion }}
          </div>
        </div>

      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

@endsection