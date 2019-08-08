@extends('layouts.app')
@section('enlace')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
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
<div class="row justify-content-center" >
        <div class="col-md-8 mt-5" style="height: 600px;">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
</div>
@endsection

@push('scripts')
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