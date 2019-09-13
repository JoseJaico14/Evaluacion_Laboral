@extends('layouts.app')
@section('enlace')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
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
    @include('Empleado.FichaResultado')
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">
            <div class="card mb-3">
                <img class="card-img-top" height="250px" src="Imagenes/desempeñolaboral.png">
                    <div class="card-body text-center">
                        <h5 class="card-title" style="font-weight: bold;">
                            Resultado De La Evaluacion
                        </h5>
                        <p class="card-text">
                            Gracias Por LLenar Las Preguntas Relacionada Con Su Desempeño
          Laboral. Nos Importa Mucho Su Desempeño y que se pueda sentir agradable en su puesto Laboral. Ademas de saber si la estrategias que implementamos como organizacion estan teniendo resultado y es de su agrado.
                        </p>
                        <p class="card-text">
                            <small class="text-muted">
                                Hace unos momentos {{ $Analisis }}
                            </small>
                        </p>
                        {{--
                        <a class="btn btn-primary show-modal" data-target="" data-toggle="" href="">
                            Revisar Evaluacion
                        </a>
                        --}}
          @if ($Analisis=="Bueno")
                        <button class="btn btn-primary show-modal" data-target="#exampleModal1" data-toggle="modal">
                            Revisar Evaluacion
                        </button>
                        @endif
           @if ($Analisis=="Deficiente")
                        <button class="btn btn-primary show-modal" data-target="#exampleModal3" data-toggle="modal">
                            Revisar Evaluacion
                        </button>
                        @endif
           @if ($Analisis=="Muy Bueno")
                        <button class="btn btn-primary show-modal" data-target="#exampleModal2" data-toggle="modal">
                            Revisar Evaluacion
                        </button>
                        @endif
                        <a class="btn btn-primary" href="{{ route('LoadPDF',['status'=>$Analisis])}}">
                            Descargar PDF
                        </a>
                        {{--
                        <a href="{{ route('ResultadoEvaluacion') }}">
                            Revisar Evaluacion
                        </a>
                        --}}
                    </div>
                </img>
            </div>
        </div>
    </div>
    @endsection
@push('scripts')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
@endpush