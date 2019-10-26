<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Modern Business - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS  -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
 
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/modern-business.css') }}" rel="stylesheet">
  
  <!-- Font Awesome LOCAL -->
  <link href="{{ asset('fontawesome-free-5.8.1-web/css/fontawesome.css') }}" rel="stylesheet">
  <link href="{{ asset('fontawesome-free-5.8.1-web/css/brands.css') }}" rel="stylesheet">
  <link href="{{ asset('fontawesome-free-5.8.1-web/css/solid.css') }}" rel="stylesheet">

  <style>
      .pagination {
                    justify-content: center;
                 }
  </style>
  
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
    <!-- url('/') va al index.blade.php  ../ para bajar un nivel-->
    <a class="navbar-brand" href="{{ url('/') }}">Cursos</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
                <a class="nav-link" href="{{ url('/admin-index') }}">Admin cursos</a>
          </li>

          
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/cursos-registrados') }}">Mis cursos</a>
            </li>
          

          <li class="nav-item">
            <a class="nav-link" href="{{ url('/listado-cursos') }}">Lista de Cursos</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Administrador
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="{{ url('/ingresar-admin') }}">Ingresar Admin</a>
              <a class="dropdown-item" href="{{ url('/registrar-admin') }}">Registrar Admin</a>
              <a class="dropdown-item" href="{{ url('/recuperar-admin') }}">Recuperar</a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Salir</a>
            </div>
          </li>
          <!-- se reutiliza el login de laravel -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Alumnos
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="{{ route('login') }}">Ingresar Alumno</a>
              <a class="dropdown-item" href="{{ route('register') }}">Registrar Alumno</a>
              <a class="dropdown-item" href="{{ route('password.request') }}">Recuperar</a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">Salir</a>
            </div>
          </li>
          <!-- fin de login de laravel -->
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </ul>
      </div>
    </div>
  </nav>

 <!-- muestra el usuario logueado  cuenta Users -->
 @if (Auth::check())
 <h2 style="background-color: grey; margin-bottom: 0px; padding: 5px; color: white;">
     Usuario:  {{ Auth::user()->name }} 
     ID:  {{ Auth::user()->id }} 
 </h2>
 @endif

 <!-- logueo administrador -->
  @if (Auth::guard('admin')->check())
  <h2 style="background-color: orange; margin-bottom: 0px; padding: 5px; color: white;">
      Usuario Admin:   {{ Auth::guard('admin')->user()->name }}
      ID:              {{ Auth::guard('admin')->user()->id }}
  </h2>
  @endif

  <!-- contenido que se cambia en las vistas -->
  @yield('cuerpo')

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>
