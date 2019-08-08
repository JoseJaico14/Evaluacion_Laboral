@extends('layouts.app')

{{-- @section('sliderpage')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    @include('layouts.slider');
@endsection --}}

@section('content')
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bst3/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/efectosextras.css') }}" rel="stylesheet">

    <header>
      <nav class="navbar navbar-default justify-content-between navbar-inverse bg-dark" style="z-index: 100;">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="Imagenes/logo2.jpg" height="50" width="163"></a>
            <!--CAPC Perú-->
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav mr-auto">
              <li class=""><a href="{{ route('home') }}" style="font-size: 1.3em">Inicio<span class="sr-only">(current)</span></a></li>
              <li><a href="#" style="font-size: 1.2em">Nosotros</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" style="font-size: 1.2em">Actividades<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('EvaluacionView') }}">Evaluacion de Desempeño</a></li>
                  <li><a href="#">Capacitaciones de Empresa</a></li>
                  <li><a  class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Cerrar Sesion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form></li>
                </ul>
              </li>
               @if (auth()->user()->role_id==2)
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" style="font-size: 1.2em">Admin<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('ReporteEvaluacion') }}">Resultado de Evaluacion</a></li>
                      <li><a href="#">Acciones de Desarrollo</a></li>
                      <div class="dropdown-divider"></div>
                      <li><a href="#">Reportes Mensuales</a></li>
                    </ul>
                  </li>
               @endif
              <li class="Users">
                <a class="" href="#" style="font-size: 1.3em">{{ Auth::user()->name }}</a>
              </li>
            </ul>
            <form class="form-inline">
              <div class="form-group" style="margin-right: 20px;">
                <input type="text" class="form-control" placeholder="Search">
              </div>
              <button type="submit" class="btn btn-default" style="font-size: 1.2em">Buscar</button>
            </form>
            
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
  </header>     
<!-- SEMI CONTENIDO -->
  <div class="container">
        <br>
        <div class="col-md-12 contn">
            <div id="carousel-1" class="carousel slide" data-ride="carousel">
                <!--Indicadores-->
                <ol class="carousel-indicators">
                    <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                     <li data-target="#carousel-1" data-slide-to="1"></li>
                     <li data-target="#carousel-1" data-slide-to="2"></li>
                </ol>
                <!--Contenedor de los slide-->
                <div class="carousel-inner" role="listbox">
                    <div class="item active">
                        <img src="{{ asset('Imagenes/GESTION PROY VIAL RESID SUPER.jpg') }}" class="img-responsive" alt="">
                       <div class="carousel-caption">
                             <h3>GESTION PROYECTO VIAL RESIDENCIAL</h3>
                             <p>Lorem ipsum dolor sit amet</p>
                       </div>
                    </div>


                    <div class="item">
                        <img src="{{ asset('Imagenes/ING AMBIENTAL.jpg') }}" class="img-responsive" alt="">
                       <div class="carousel-caption">
                             <h3>INGENIERIA AMBIENTAL</h3>
                             <p>Lorem ipsum dolor sit amet</p>
                       </div>
                    </div>


                    <div class="item">
                        <img src="{{ asset('Imagenes/ING GEOTECNICA.jpg') }}" class="img-responsive" alt="">
                       <div class="carousel-caption">
                             <h3>INGENIERIA GEOTECNICA</h3>
                             <p>Lorem ipsum dolor sit amet</p>
                       </div>
                    </div>

                </div>
            



          <a href="#carousel-1" class="left carousel-control" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>

        <a href="#carousel-1" class="right carousel-control" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Siguiente</span>
        </a>

            </div>

        </div>

    </div>

<!--ICONOS-->
    <div class="conte">

     <div class="iconos">
     <span class="glyphicon glyphicon-education" aria-hidden="true"></span>
          <span class="sr-only">Usuarios Capacitados</span>
     </div> 
     <div  class="detalleiconos">

        <p class="num">5987</p>
        <p class="inf">Usuarios 
         Capacitados</p>
     </div> 
    </div>
    
    <div class="conte">
    
    <div class="iconos">
     <span class="glyphicon glyphicon-blackboard" aria-hidden="true"></span>
          <span class="sr-only">Usuarios Capacitados</span>
    </div>
    <div  class="detalleiconos">

        <p class="num">1178</p>
        <p class="inf">Sesiones de Capacitaciones</p>
     </div> 
    </div>

    <div class="conte">
    
     <div class="iconos">
     <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span>
          <span class="sr-only">Usuarios Capacitados</span>
    </div>
    <div  class="detalleiconos">

        <p class="num">215</p>
        <p class="inf">Programacion de Capacitaciones</p>
     </div> 
    </div>
    
      <div class="conte">
     <div class="iconos">
     <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
          <span class="sr-only">Usuarios Capacitados</span>
    </div>
    <div  class="detalleiconos">

        <p class="num">53</p>
        <p class="inf">Staff de 
       profesionales</p>
     </div> 
    </div>
    
<!--MISION Y ENLACE DE VIDEO    -->
<div class="mis">
<div class="infmision">

 <img  class="cacp" src="{{ asset('Imagenes/logo1.jpg') }}" width="250" height="100">
 <p class="mision">Somos una empresa con presencia nacional e internacional, 
 vinculada a un staff de profesionales con amplia experiencia en 
 Consultoría, Asesoría y Capacitación. Que cuenta con convenios 
 de prestigiosas Universidades Nacionales y empresas.</p>

</div>

<div class="video">
<img src="{{ asset('Imagenes/capacitacion.jpg') }}" width="600" class="capacitacion">
       <div class="overlay">
       <div class="content">
        <a href="https://youtu.be/PCHt1NtikdI"><img src="{{ asset('Imagenes/icono-play.jpg') }}" width="100"></a>
        </div>
       </div>
</div>
</div>

<!--ENTRA AL CAMPUS-->

<div class="campus">

<div class="ca">
<p class="pa1">DESCUBRE NUESTRO NUEVO CAMPUS</p>
<p class="pa2">Accede para empezar una experiencia única en educación online</p>
</div>

     <a href="#" style="text-decoration:none; color:#000"><div class="contecampu">

     <div class="iconocampu">
     <span class="glyphicon glyphicon-education" aria-hidden="true"></span>
          <span class="sr-only">Usuarios Capacitados</span>
     </div> 
        <p>CAMPUS VIRTUAL</p>
        
    </div></a>
     
</div>

<!--PROGRAMACION DE CAPACITACION-->


<div class="capac">

<p class="p1">Programas de Capacitación</p>
<p class="p2">Actualizate, Perfeccionate y Especializate</p>

</div>

<!--CUADRO DE SELECCION-->

<div class="fond">
   <div class="cuadro">
   <ul>
   <a href="#" style="color:#EEE"><li style="background:#80FF80">Todos</li></a>
    <a href="#" style="color:#000"><li>Curso</li></a>
    <a href="#" style="color:#000"><li>Diplomado</li></a>
    <a href="#" style="color:#000"><li>Otros</li></a>
   </ul>
   </div>
</div>

<!--DIPLOMADO-->

<div class="contenedor">


<a href="#"><div id="gallery">
<figure>

<img id="gallery1" src="{{ asset('Imagenes/ING GEOTECNICA.jpg') }}" width="240" height="250">

</figure>
<div class="overlaydi">
<div id="contendi">
<span class="glyphicon glyphicon-search" aria-hidden="true" style="margin-left:40px;"></span>
          <span class="sr-only">Usuarios Capacitados</span>
          <p style="font-family:'Arial Black'; font-size:16px">Ver detalle <span>del diplomado</span></p>
</div>
</div>
</div></a>


<div class="infdi">
<p style="font-family:'Trebuchet MS'; font-size:0.9em;">DIPLOMADO</p>
<p style="font-family:'Arial Black'; font-size:1.6em; color:#050">Ingeniería Geotécnica 2018 - I</p>
</div>

<div class="datos">

<div class="datos1">

<p>384</p>
<p>Horas</p>

</div>

<div class="datos2">

<p>6</p>
<p>Meses</p>

</div>

<div class="datos3">

<p>18 de marzo</p>
<p>Inicio</p>

</div>


</div>

</div>

<!--EFETO 2-->
<div class="contenedor">
<a href="#"><div id="gallery">
<figure>
<img id="gallery2" src="{{ asset('Imagenes/ING AMBIENTAL.jpg')}}" width="240" height="250">
</figure>
<div class="overlaydi">
<div id="contendi1">
<span class="glyphicon glyphicon-search" aria-hidden="true" style="margin-left:40px;"></span>
          <span class="sr-only">Usuarios Capacitados</span>
          <p style="font-family:'Arial Black'; font-size:16px">Ver detalle <span>del diplomado</span></p>
</div>
</div>
</div></a>
<div class="infdi">
<p style="font-family:'Trebuchet MS'; font-size:0.9em;">DIPLOMADO</p>
<p style="font-family:'Arial Black'; font-size:1.6em; color:#050">Ingeniería Ambiental 2018 - I</p>
</div>
<div class="datos">
<div class="datos1">
<p>384</p>
<p>Horas</p>

</div>

<div class="datos2">

<p>6</p>
<p>Meses</p>

</div>

<div class="datos3">

<p>24 de marzo</p>
<p>Inicio</p>

</div>
</div>
</div>

<!--EFECTO 3-->
<div class="contenedor">
<a href="#"><div id="gallery">
<figure>
<img id="gallery3" src="{{ asset('Imagenes/GESTION PROY VIAL RESID SUPER.jpg')}}" width="240" height="250">
</figure>
<div class="overlaydi">
<div id="contendi">
<span class="glyphicon glyphicon-search" aria-hidden="true" style="margin-left:40px;"></span>
          <span class="sr-only">Usuarios Capacitados</span>
          <p style="font-family:'Arial Black'; font-size:16px">Ver detalle <span>del diplomado</span></p>
</div>
</div>
</div></a>
<div class="infdi">
<p style="font-family:'Trebuchet MS'; font-size:0.9em;">DIPLOMADO</p>
<p style="font-family:'Arial Black'; font-size:1.6em; color:#050">Gestion de Proyectos Viales  2018 - I</p>
</div>
<div class="datos">
<div class="datos1">
<p>384</p>
<p>Horas</p>

</div>

<div class="datos2">

<p>6</p>
<p>Meses</p>

</div>

<div class="datos3">

<p>30 de marzo</p>
<p>Inicio</p>

</div>
</div>
</div>
<!--EFECTO 4-->
<div class="contenedor">
<a href="#"><div id="gallery">
<figure>
<img id="gallery4" src="{{ asset('Imagenes/GESTION PUBLICA.jpg')}}" width="240" height="250">
</figure>
<div class="overlaydi">
<div id="contendi1">
<span class="glyphicon glyphicon-search" aria-hidden="true" style="margin-left:40px;"></span>
          <span class="sr-only">Usuarios Capacitados</span>
          <p style="font-family:'Arial Black'; font-size:16px">Ver detalle <span>del diplomado</span></p>
</div>
</div>
</div></a>
<div class="infdi">
<p style="font-family:'Trebuchet MS'; font-size:0.9em;">DIPLOMADO</p>
<p style="font-family:'Arial Black'; font-size:1.6em; color:#050">Gestion de Publica  2018 - I</p>
</div>
<div class="datos">
<div class="datos1">
<p>384</p>
<p>Horas</p>

</div>

<div class="datos2">

<p>5</p>
<p>Meses</p>

</div>

<div class="datos3">

<p>25 de marzo</p>
<p>Inicio</p>

</div>
</div>
</div>

<script src="{{ asset('js/bost3js/bootstrap.min.js')}}"></script>
@endsection