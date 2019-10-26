@extends('cursos/capas.ppal') 
@section('cuerpo')

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Items del
    <small>{{ isset($materiales->first()->cursos->titulo)? $materiales->first()->cursos->titulo : ' No Titulo' }}</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ url('/cursos-registrados') }}">Usuario</a>
      </li>
      <li class="breadcrumb-item active">Curso ID: {{ isset($materiales->first()->cursos->id)? $materiales->first()->cursos->id : "no id" }} </li>
    </ol>
    

    @foreach ($materiales as $material)
        @php
          // cargar fotos;
          $foto= $material->url_material;
          if (strpos($foto, 'http') !== false) {
            // si es un URL HTTP / HTTPS no se pone nada
          } else {
            $foto= '/material/' . $foto;
          }
          // cual etiqueta multimedia IMG/VIDEO
          $formato=strpos($foto, 'mp4') !== false? "video" : "foto"; 
        @endphp   
      <!-- Project One -->
      <div class="row">
          <div class="col-md-7">
            <a href="{{ url('/tema-del-item/' . $material->id ) }}">
              @if ($formato == 'foto')
                  <img class="img-fluid rounded mb-3 mb-md-0" src="{{ $foto }}" alt="">
              @else
                  <div class="embed-responsive embed-responsive-16by9">
                      <video width="" height="" controls>
                          <source src="{{ $foto }}" type="video/mp4">
                      </video>
                  </div>
              @endif        
            </a>
          </div>
          <div class="col-md-5">
            <h3>{{ $material->titulo }}</h3>
            <p>{{ $material->descripcion }}</p>
            <a class="btn btn-primary" href="{{ url('/tema-del-item/'. $material->id ) }}">Ver Contenido
               <span class="glyphicon glyphicon-chevron-right"> {{ $material->id }}</span>
            </a>
          </div>
        </div>
        <br>
        <!-- /.row -->
    @endforeach
    
    <!-- Pagination -->
    {{ $materiales->links() }}

    <!-- Comments Form -->
    <div class="card my-4">
        @php
          $id_user = Session::get('id_user');
          $id_curso = Session::get('id_curso'); 
        @endphp
        <h5 class="card-header">Dejar un Comentario:</h5>
        <p>&nbsp&nbsp&nbsp&nbsp id_user: {{ $id_user }}  id_curso: {{ $id_curso  }}</p>
        <div class="card-body">
           <form method="POST" action="{{ route('RegistrarComentario') }}">
                @csrf
                <div class="form-group">
                  <textarea class="form-control" rows="3" name="comentario"></textarea>
                </div>
                <input type="hidden" name="id_user" value="{{ $id_user }}">
                <input type="hidden" name="id_curso" value="{{ $id_curso }}">
                <button type="submit" class="btn btn-primary">Registrar</button>
          </form>
        </div>
    </div>
   <!-- end Comments Form -->
   
   @php
       // consulta desde una vista
       $comentarios = \cursos\Cursos::find($id_curso)->comentarios;
   @endphp
   <!-- -->
   @foreach ($comentarios as $comentario)
      <!-- Single Comment -->
      <div class="media mb-4">
        <img class="d-flex mr-3 rounded-circle" src="http://lorempixel.com/50/50/" alt="">
        <div class="media-body">
        <h5 class="mt-0">Autor: {{ $comentario->name }}</h5>
        <!-- pivot para llamar al contenido de la tabla pivote -->
        <small>{{ $comentario->pivot->created_at }} id_user: {{ $comentario->pivot->id_user }} id_curso: {{ $comentario->pivot->id_curso }}  </small><br><br>
        <p> {{ $comentario->pivot->comentario }}</p>
        </div>
      </div>
   @endforeach

    <!-- Boton Call to Action Section -->
    <div class="row mb-4">
      <div class="col-md-8">    
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="{{ url('/cursos-registrados') }}">Retornar a Cursos Registrados</a>
      </div>
    </div>



  </div>
  <!-- /.container -->

  @endsection