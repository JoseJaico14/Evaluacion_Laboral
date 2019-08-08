@extends('layouts.app')
@section('enlace')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <style>
      .modal-dialog{
        max-width: none;
      }
    </style>
@endsection
@section('sliderpage')
    @include('layouts.slider');
@endsection

@section('content')
	<div class="row justify-content-center">
     	<div class="col-md-10">
           @if(session('message'))
            <div class="alert alert-success mt-3">
                    {{ session('message') }}
            </div>
          @endif
        </div>
  	</div>
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered m-5" role="document">
        <div class="card-group">
          <div class="card">
            <img src="Imagenes/conocidelpuesto.png" class="card-img-top" height="180px">
            <div class="card-body">
              <h5 class="card-title text-center">Conocimiento del Puesto</h5>
              <p class="card-text text-justify">Gracias a esta evaluacion podemos destacar en usted señor <strong>{{ Auth::user()->name }}</strong> que es un miembro responsable y muy habilidoso en su puesto laboral su dedicacion y empeño nos hace pensar que en el futuro podra alcanzar puestos mas importantes .</p>
            </div>
            <div class="card-footer">
              <small class="text-muted text-center">Conocimiento del Puesto</small>
            </div>
          </div>
          <div class="card">
            <img src="Imagenes/coaching-ejecutivo.jpg" class="card-img-top" height="180px">
            <div class="card-body">
              <h5 class="card-title text-center">Trabajo en Equipo</h5>
              <p class="card-text text-justify">Ser una organizacion Nacional como es el MINISTERIO PUBLICO y con varias sedes en cada provincia del pais hace de esto una situacion muy compleja es por eso que la coperacion mutua a traves del trabajo en equipo es fundamental para nosotros y podemos decir que usted señor <strong>{{ Auth::user()->name }}</strong> es de mucho apoyo con ese aspecto, promueve los objetivos del equipo y a menudo coloca estos objetivos por delante de los suyos.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted text-center">Trabajo en Equipo</small>
            </div>
          </div>
          <div class="card">
            <img src="Imagenes/comunicaci.jpg" class="card-img-top" height="180px">
            <div class="card-body">
              <h5 class="card-title text-center">Habilidades de Comunicacion</h5>
              <p class="card-text text-justify">Sus Indice con el trabajo en equipo nos muestra el nivel de comunicacion que ustedes posee logrando una sincronizacion y compenetracion con los demas miembros de la organizacion que aporta mucho al MINISTERIO PUBLICO.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted text-center">Habilidades de Comunicacion</small>
            </div>
          </div>
          <div class="card">
            <img src="Imagenes/produccion.jpg" class="card-img-top" height="180px">
            <div class="card-body">
              <h5 class="card-title text-center">Productividad</h5>
              <p class="card-text text-justify">Es importante que con la cantidad de casos que tenemos que atender para la poblacion Chimbotana,el trabajar rapido es un punto clave en la eficiencia del estado y usteded señor <strong>{{ Auth::user()->name }}</strong> logra cumplir con los requisitos establecidos y es un gran empuje para seguir atentiendo de manera rapida a los ciudadanos .</p>
            </div>
            <div class="card-footer">
              <small class="text-muted text-center">Productividad</small>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered m-5" role="document">
        <div class="card-group">
          <div class="card">
          <img src="Imagenes/conocidelpuesto.png" class="card-img-top" height="180px">
          <div class="card-body">
            <h5 class="card-title">Conocimiento del Puesto</h5>
            <p class="card-text text-justify">Gracias a esta evaluacion podemos destacar en usted señor <strong>{{ Auth::user()->name }}</strong> que es un miembro que presenta una excelente capacidad de conocimiento en su puesto laboral llegando a reconocer y solucionar problemas, su dedicacion y empeño nos confirma la confianza que le brindamos en el puesto que hoy ejerce en el Ministerio Publico resaltando su trabajo y entrega.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Conocimiento del Puesto</small>
          </div>
          </div>
          <div class="card">
            <img src="Imagenes/coaching-ejecutivo.jpg" class="card-img-top" height="180px">
            <div class="card-body">
              <h5 class="card-title">Trabajo en Equipo</h5>
              <p class="card-text text-justify">El MINISTERIO PUBLICO señor <strong>{{ Auth::user()->name }}</strong> esta completamente conforme con el trabajo conjunto que usted desempeña con los demas miembros del Ministerio Publico ademas el compromiso y union que usted presenta con sus compañeros es un aporte invaluable que se muestra en la calidad de cada proyecto asignado .</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Trabajo en Equipo</small>
            </div>
          </div>
          <div class="card">
            <img src="Imagenes/comunicaci.jpg" class="card-img-top" height="180px">
            <div class="card-body">
              <h5 class="card-title">Habilidades de Comunicacion</h5>
              <p class="card-text text-justify">Gracias a los buenos resultados en el trabajo en equipo podemos decir que la comunicacion que establece con los miembros del Ministerio Publico es realmente buena, gracias a su forma de explicar de manera clara y precisa los demas miembros pueden hacer un buen trabajo y aportar mucho mas a la responsabilidad asignada por el Ministerio Publico.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Habilidades de Comunicacion</small>
            </div>
          </div>
          <div class="card">
            <img src="Imagenes/produccion.jpg" class="card-img-top" height="180px">
            <div class="card-body">
              <h5 class="card-title">Productividad</h5>
              <p class="card-text text-justify">La cantidad de casos que tenemos que atender para la poblacion Chimbotana, nos genera mucha presion todo el tiempo y usteded señor <strong>{{ Auth::user()->name }}</strong> gracias a su habilidades de grupos y comunicacion, se convierte en un punto muy fuerte de la fiscalia y  nos ayuda mucho en tratar de satisfacer la ganas de justicia del pueblo chimbotano por eso la Fiscalia de chimbote lo felicita grandemente .</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Productividad</small>
            </div>
          </div>
      </div>
      </div>
    </div>
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered m-5" role="document">
        <div class="card-group">
          <div class="card">
          <img src="Imagenes/conocidelpuesto.png" class="card-img-top" height="180px">
          <div class="card-body">
            <h5 class="card-title">Conocimiento del Puesto</h5>
            <p class="card-text text-justify">Gracias a esta evaluacion podemos decir usted señor <strong>{{ Auth::user()->name }}</strong> que usted no presenta las habilidades del puesto que hoy ocupa ya que no desempeña bien su actividades,le recomendamos mejorar apartir de ahora para no tomar decisiones drasticas valoraremos su esfuerzo.</p>
          </div>
          <div class="card-footer">
            <small class="text-muted">Conocimiento del Puesto</small>
          </div>
          </div>
          <div class="card">
            <img src="Imagenes/coaching-ejecutivo.jpg" class="card-img-top" height="180px">
            <div class="card-body">
              <h5 class="card-title">Trabajo en Equipo</h5>
              <p class="card-text text-justify">El MINISTERIO PUBLICO señor <strong>{{ Auth::user()->name }}</strong> detecta que su trabajo en cordinacion con los demas miembros de la Fiscalia es muy deficiente es por eso que le recomendamos mejorar sus habilidades dentro de la organizacion.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Trabajo en Equipo</small>
            </div>
          </div>
          <div class="card">
            <img src="Imagenes/comunicaci.jpg" class="card-img-top" height="180px">
            <div class="card-body">
              <h5 class="card-title">Habilidades de Comunicacion</h5>
              <p class="card-text text-justify">Debio a su deficiente trabajo en equipo podemos concluir que no maneja mucho habilidades comunicativas es por esto que deseamos que mejore en estos aspectos somos una organizacion del estado con miles de casos por atender y no podemos permitirnos perder el tiempo.</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Habilidades de Comunicacion</small>
            </div>
          </div>
          <div class="card">
            <img src="Imagenes/produccion.jpg" class="card-img-top" height="180px">
            <div class="card-body">
              <h5 class="card-title">Productividad</h5>
              <p class="card-text text-justify">La cantidad de casos que tenemos que atender para la poblacion Chimbotana, nos genera mucha presion todo el tiempo y usteded señor <strong>{{ Auth::user()->name }}</strong> no es muy productivo apesar de las otras habilidads que posee, debe aportar y esforzarse un poco mas para lograr los objetivos que planeamos para la Fiscalia y usted .</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Productividad</small>
            </div>
          </div>
      </div>
      </div>
    </div>
	<div class="row justify-content-center">
        <div class="col-md-10 mt-5">
        	<div class="card mb-3">
			  <img src="Imagenes/desempeñolaboral.png" class="card-img-top" height="250px">
			  <div class="card-body text-center">
			    <h5 class="card-title" style="font-weight: bold;">Resultado De La Evaluacion</h5>
			    <p class="card-text">Gracias Por LLenar Las Preguntas Relacionada Con Su Desempeño
			    Laboral. Nos Importa Mucho Su Desempeño y que se pueda sentir agradable en su puesto Laboral. Ademas de saber si la estrategias que implementamos como organizacion estan teniendo resultado y es de su agrado.</p>
			    <p class="card-text"><small class="text-muted">Hace unos momentos {{ $Analisis }}</small></p>
			    {{-- <a href="" class="btn btn-primary show-modal" data-toggle="" data-target="">Revisar Evaluacion</a> --}}
          @if ($Analisis=="Bueno")
              <button class="btn btn-primary show-modal" data-toggle="modal" data-target="#exampleModal1">Revisar Evaluacion</button>
          @endif
           @if ($Analisis=="Deficiente")
              <button class="btn btn-primary show-modal" data-toggle="modal" data-target="#exampleModal3">Revisar Evaluacion</button>
          @endif
           @if ($Analisis=="Muy Bueno")
              <button class="btn btn-primary show-modal" data-toggle="modal" data-target="#exampleModal2">Revisar Evaluacion</button>
          @endif
          {{-- <a href="{{ route('ResultadoEvaluacion') }}">Revisar Evaluacion</a> --}}
			  </div>
			</div>
        </div> 
  	</div>
@endsection