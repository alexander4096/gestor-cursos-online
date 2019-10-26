<!-- seccion de bloque -->
@extends('cursos/capas/template-admin')

@section('admin-content')


        <!-- Comments Form -->
        <div class="card my-4">
                <h5 class="card-header">Commentarios sobre el Curso</h5>    
                <h3 class="card-header text-center"> {{ $curso->titulo }} </h3>
        </div>
        
        @foreach ($comentarios as $comentario)
          <!-- Single Comment -->
          <div class="media mb-4">
              <img class="d-flex mr-3 rounded-circle" src="http://lorempixel.com/50/50/" alt="">
              <div class="media-body">
              <h5 class="mt-0">Autor: {{ $comentario->name }}</h5>
              <!-- pivot para llamar al contenido de la tabla pivote -->
              <small>{{ $comentario->pivot->created_at }}</small><br><br>
              <p>{{ $comentario->pivot->comentario }}</p>
              </div>
          </div>
        @endforeach
         
      <!-- Paginacion -->
      {{ $comentarios->links() }}

@endsection

<!-- secciones para poner texto especifico -->
@section('titulo', 'Comentario')
<!-- resaltar -->
@section('class-active-4','active')