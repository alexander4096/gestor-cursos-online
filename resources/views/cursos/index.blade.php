@extends('cursos/capas.ppal')

@section('cuerpo')
  

  
  <header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <!-- tag de slide indicador -->
        <?php $count = 0; ?>
        @foreach ($galeriafotos as $galeriafoto)
            @if ($count==0)
                <?php $estado ='active'; ?>
            @else
                <?php $estado =''; ?>
            @endif
            <li data-target="#carouselExampleIndicators" data-slide-to="{{ $count }}" class="{{ $estado }}"></li>
            <?php $count++; ?>
        @endforeach  
        
      </ol>

      <!-- slider cuerpo del carrusel -->
      <div class="carousel-inner" role="listbox">
        <?php $count = 0; ?>
        @foreach ($galeriafotos as $galeriafoto)
          @if ($count==0)
              <?php $estado ='active'; ?>
          @else
              <?php $estado =''; ?>
          @endif
          <?php $count++; ?>
          @php
              // evita error campo vacio
              if(empty($galeriafoto->url_fotos)){
                  $foto= '/img/' . 'ImagenNoDisponible.jpg';
              }else{       
                  // cargar atributo url_fotos;
                  $foto= $galeriafoto->url_fotos;
                  // poner ruta /img/ donde esta la foto
                  $foto= '/img/' . $foto;         
              }
          @endphp     

          <!-- Slide generado dinamicamente -->
         <div class="carousel-item {{ $estado }}" style="background-image: url('{{ asset($foto) }}')">
            <div class="carousel-caption d-none d-md-block">
                  {{--  previene error en ausencia de registros para consulta con relacion cursos->titulo --}}
				  @isset($galeriafoto->cursos->titulo)
						<h3>{{ $galeriafoto->cursos->titulo }}</h3>
				  @endisset   
                <p>{{ $galeriafoto->titulofotos }}</p>
              </div>
          </div>
        @endforeach
      </div>

      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </header>

  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Listado de Cursos</h1>

    <!-- Portfolio Section -->
    <h2>Cursos Destacados</h2>

    <div class="row">

      @foreach ($cursos as $curso)
      @if ($curso->destacado == 1)

       <div class="col-lg-4 col-sm-6 portfolio-item">
          <div class="card h-100">
         
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
        
          <a href="{{ url('/detalle-curso/' . $curso->id ) }}"><img class="card-img-top" src="{{ asset($foto) }}" alt=""></a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="{{ url('/detalle-curso/' . $curso->id) }}">{{ $curso->titulo }}</a>
              </h4>
              <p class="card-text">{{ str_limit($curso->descripcion,100,'...') }}</p>
            </div>
          </div>
        </div>

      @endif
      @endforeach
      
    </div>
    <!-- /.row -->

   

    <hr>

    <!-- Boton Call to Action Section -->
    <div class="row mb-4">
      <div class="col-md-8">    
      </div>
      <div class="col-md-4">
        <a class="btn btn-lg btn-secondary btn-block" href="{{ url('/listado-cursos') }}">Listados de Cursos</a>
      </div>
    </div>

  </div>
  <!-- /.container -->

  @endsection