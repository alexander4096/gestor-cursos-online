@extends('cursos/capas/template-admin') 

@section('admin-content')

 <h2 style="margin-top: 10px; margin-bottom: 50px;">VER MATERIAL</h2>

  <!-- se copia el bloque form de register -->
 <form method="POST" action="">
        @csrf

        <div class="form-group row">
            <label for="name" class="col-md-4 col-form-label">Titulo</label>

            <div class="col-md-12">
            <input id="name" type="text" class="form-control" name="name" value="{{ $material->titulo }}" required autofocus readonly>               
            </div>
        </div>

        <div class="form-group">
                <label for="exampleFormControlTextarea1">Descripcion del Material</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" readonly>{{ $material->descripcion }}</textarea>
        </div>

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label">URL</label>
            <div class="col-md-12">
                <input id="" type="text" class="form-control" name="" value="{{ $material->url_material }}" required readonly>           
            </div>
        </div>

         <!-- img / video -->
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
       
    </form>


    <p class="text-right">
            <a href="{{ route('admin-cursos.show', $material->id_curso ) }}" title="">
                    <button type="button" class="btn btn-info">Retornar -></button>
            </a>
     </p>

@endsection

 <!-- secciones para poner texto especifico -->
 @section('titulo', 'Cursos / Materiales')
 <!-- resaltar -->
 @section('class-active-3','active')
     