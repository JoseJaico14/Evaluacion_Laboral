@extends('layouts.app')
@section('enlace')
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
@endsection
@section('sliderpage')
    @include('layouts.slider');
@endsection

@section('content')
    
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-md-offset-2">
                <div class="card mb-5">
                  <h2 class="card-title  text-center m-4">Bienvenido Señor(a) {{  Auth::user()->name }}</h2>
                  <div class="card-body">
                    <h5 class="card-title">Cuestionario Para Evaluar Su Desempeño Laboral:</h5>
                    <p class="card-text">Marque las alternativas para poder contruir su perfil mas adecuado.</p>
                    
                            <form action="{{ route('StoreEvaluacion') }}" method="POST" id="FichaEvaluacion">
                               {{ csrf_field() }}
                               <input type="hidden" name="NE" value="{{ count($Assignment) }}">
                                @for ($i = 0; $i < count($Assignment); $i++)
                                    <table class="table  table-striped table-hover mt-5 Pgt1">
                                      <thead class="table">
                                          <tr><th>{{ $DescriptionSurvey[$i]->descripcion }}</th></tr>
                                          <tr><th>Preguntas</th>
                                  @for ($j = 0; $j < count($Assignment[$i]) ; $j++)
                                            <th>{{ $Assignment[$i][$j]->alternativa }}</th>
                                  @endfor
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @for ($k = 0; $k <count($Questions[$i]) ; $k++)
                                            <tr>
                                              <td>{{ $Questions[$i][$k]->detalle }}</td>
                                              @for ($p = 0; $p < count($Assignment[$i]) ; $p++)
                                                    <td> 
                                                        <div class="custom-control custom-radio">
                                                          <input type="radio" id="customRadio{{ $i.$k.$p }}" name="customRadio{{ $i.$k }}" class="custom-control-input" value="{{ $Assignment[$i][$p]->id_alternativa }}">
                                                          <label class="custom-control-label" for="customRadio{{ $i.$k.$p }}"></label>
                                                        </div>
                                                    </td>
                                              @endfor
                                              
                                          </tr>
                                        @endfor
                                          

                                      </tbody>
                                  </table>
                                @endfor
                           </form>
                   {{--  <table class="table table-hover mt-5 Pgt2">
                        <thead class="table-primary">
                            <tr>
                                <th>APTITUD DE MANDO</th>
                            </tr>
                            <tr>
                                <th>Preguntas</th>
                                <th>Nunca</th>
                                <th>Casi Nunca</th>
                                <th>Aveces</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>¿Qué grado de disposición tengo para aceptar responsabilidades?</td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio13" name="customRadio3" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio13"></label>
                                    </div>
                                </td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio14" name="customRadio3" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio14"></label>
                                    </div>
                                </td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio15" name="customRadio3" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio15"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>¿Debo supervisar al personal constantemente?</td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio16" name="customRadio4" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio16"></label>
                                    </div>
                                </td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio17" name="customRadio4" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio17"></label>
                                    </div>
                                </td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio18" name="customRadio4" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio18"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>¿Necesito supervisión sólo en ciertos aspectos de mi trabajo?</td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio19" name="customRadio5" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio19"></label>
                                    </div>
                                </td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio20" name="customRadio5" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio20"></label>
                                    </div>
                                </td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio21" name="customRadio5" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio21"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>¿Debo supervisar al personal constantemente?</td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio22" name="customRadio6" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio22"></label>
                                    </div>
                                </td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio23" name="customRadio6" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio23"></label>
                                    </div>
                                </td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio24" name="customRadio6" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio24"></label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>¿Necesito supervisión sólo en ciertos aspectos de mi trabajo?</td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio25" name="customRadio7" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio25"></label>
                                    </div>
                                </td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio26" name="customRadio7" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio26"></label>
                                    </div>
                                </td>
                                <td> 
                                    <div class="custom-control custom-radio">
                                      <input type="radio" id="customRadio27" name="customRadio7" class="custom-control-input">
                                      <label class="custom-control-label" for="customRadio27"></label>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table> --}}
                    <button class="btn btn-primary" id="Evaluar">Evaluar</button>
                  </div>
                  <div class="card-footer text-muted">
                    Marque todas las opciones
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script>   
        $(document).ready(function() {
            let NumTable=$('table').toArray().length;
            let ValidRadio=true;
            //let FocusTable=$(".Pgt"+(i+1)).toArray();
            //let NumColum=$(".Pgt"+(i+1)+" thead th").toArray().length-2;
            //let NumFilas=$("div table:nth-child("+(i)+") tbody tr").toArray().length;
            // let NumFilas=$("table tbody tr").toArray().length;
            //console.log(NumColum);

            $('#Evaluar').click(function(event) {
                    let NumFilas=$("table tbody tr").toArray().length;
                    let NumColumna={{ count($Assignment) }};

                    for (var i = 0; i < NumColumna; i++) {
                      for (var j = 0; j < NumFilas; j++) {
                        //saber si existe el radio button;
                          if ($('input[name=customRadio'+i+j+']:radio').length>0) {
                             if($('input[name=customRadio'+i+j+']:radio').is(':checked')!=true){
                                ValidRadio=false;
                                break;
                              }
                          }else{
                                break;
                          }
                          
                        }
                    }
                    if (ValidRadio!=true) {
                      console.log('Al menos uno no esta selecionado ');
                    }else{
                      $("#FichaEvaluacion").submit();
                    }
                    // (ValidRadio!=true)? console.log('Al menos uno no esta selecionado '):console.log('Enviar el formulario ');
                    
            });
        });

    </script>
@endpush