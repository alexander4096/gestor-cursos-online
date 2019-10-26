@extends('cursos/capas.ppal') 
@section('cuerpo')
 
 <?php
   // valor de id inicial
   $id=1;
 ?> 
 <!-- Page Content -->
  <div class="container">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3">Listado de Cursos
      <small>Disponibles</small>
    </h1>

    
   <!-- Search Widget -->
   <div class="card mb-4">
    <h5 class="card-header">Search</h5>
    <div class="card-body">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
        <span class="input-group-btn">
          <button class="btn btn-secondary" type="button">Go!</button>
        </span>
      </div>
    </div>
  </div> 


    <div class="row">
      <!-- contenido de listado -->
      @foreach ($cursos as $curso)
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
          <div class="col-lg-6 portfolio-item">
            <div class="card h-100">
              <a href="{{ url('/detalle-curso/'. $curso->id) }}"><img class="card-img-top" src="{{ asset($foto) }}" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="{{ url('/detalle-curso/'. $curso->id) }}">{{ $curso->titulo }}</a>
                </h4>
                <p class="card-text">{{ str_limit($curso->descripcion,100,'...') }}</p>
              </div>
            </div>
          </div>
        @endforeach  
    </div>
    <!-- /.row -->

    <!-- Pagination -->
        {{ $cursos->links() }}
    
       

  </div>
  <!-- /.container -->

  @endsection