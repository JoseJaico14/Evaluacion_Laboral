@extends('layouts.app')
@section('enlace')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
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
<div class="row justify-content-center" >
        <div class="col-md-8 mt-5" style="height: 600px;">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
</div>
@endsection

@push('scripts')
    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
     <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        const esta = {!! json_encode($sumporencuesta) !!};
        console.log(esta);
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Conocimiento del puesto', 'Planificación y resolución', 'Productividad', 'Trabajo en equipo', 'Habilidades de comunicación', 'Habilidades de dirección','Competencias Estrategicas','Valores de la organizacion'],
                datasets: [{
                    label: 'Resultados de Evaluacion de Desempeño por Encuesta',
                    data: esta,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                                                        elements: {
                                                            line: {
                                                                tension: 0, // disables bezier curves
                                                             }
                                                        }
            }
        });
    </script>
@endpush