@extends('cursos/capas.ppal') 
@section('cuerpo')

  <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">{{ $material->titulo }}
      <small></small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="">Curso:</a>
      </li>
    <li class="breadcrumb-item active">{{ $material->cursos->titulo }}</li>
    <li class="breadcrumb-item active">{{ $material->cursos->id }}</li>
    </ol>
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
      <div class="col-md-7">
              @if ($formato == 'foto')
                  <img class="img-fluid rounded mb-3 mb-md-0" src="{{ $foto }}" alt="">
              @else
                  <div class="embed-responsive embed-responsive-16by9">
                      <video width="" height="" controls>
                          <source src="{{ $foto }}" type="video/mp4">
                      </video>
                  </div>
              @endif       
      </div>
    <p>{{ $material->descripcion }}</p>

<!-- Boton Call to Action Section -->
<div class="row mb-4">
  <div class="col-md-8">    
  </div>
  <div class="col-md-4">
    <a class="btn btn-lg btn-secondary btn-block" href="{{ url('/items-del-curso/'. $material->id_curso ) }}">Retornar a Items de Cursos</a>
  </div>
</div>
  
  </div>
  <!-- /.container -->
  


  @endsection