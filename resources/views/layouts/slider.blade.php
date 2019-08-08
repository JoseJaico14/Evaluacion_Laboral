

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  {{-- <a class="navbar-brand" href="{{ route('home') }}">FISCALIA DE CHIMBOTE</a> --}}
  <a class="navbar-brand" href="{{ route('home') }}"><img src="Imagenes/logo2.jpg" height="50" width="163"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{ route('home') }}">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Nosotros</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Actividades <span class="caret"></span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="{{ route('EvaluacionView') }}">Evaluacion de Desempeño</a>
          <a class="dropdown-item" href="#">Acciones de Desarrollo</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Consultas</a>
          <a  class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
              Cerrar Sesion
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </div>
      </li>
      @if (auth()->user()->role_id==2)
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
           Admin <span class="caret"></span>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('ReporteEvaluacion') }}">Resultado de Evaluacion</a>
            <a class="dropdown-item" href="#">Acciones de Desarrollo</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Reportes Mensuales</a>
          </div>
        </li>
      @endif
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      <li class="nav-item">
        <a class="nav-link" href="#" tabindex="-1" aria-disabled="true">{{ Auth::user()->name }}</a>
      </li>
    </form>
  </div>
</nav>