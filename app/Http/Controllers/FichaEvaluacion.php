<?php

namespace App\Http\Controllers;

use App\alternativa;
use App\detalle_encuesta;
use App\detalle_fichas;
use App\encuesta;
use App\ficha;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FichaEvaluacion extends Controller
{
    public $preguntas;
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Evaluacion_view()
    {

        $user            = Auth::user();
        $encuesta        = [1, 2, 3, 4, 5, 6, 7, 8];
        $ficha_confirmed = ficha::where('users_id', $user->id)->get()->pluck('confirmed')->all();

        if ($ficha_confirmed == null or $ficha_confirmed[0] == 0) {

            $preguntas     = $this->Asignacion($user, 'detalle_encuesta', 'pregunta', 'pregunta_id', 'detalle', 'id_pregunta');
            $alternativas  = $this->Asignacion($user, 'detalle_alternativa', 'alternativa', 'alternativa_id', '*', 'id_alternativa');
            $tipo_encuesta = encuesta::select('descripcion')->whereIn('id_encuesta', $encuesta)->get();

            return view('Empleado.FichaEvaluacion', compact('preguntas', 'alternativas', 'tipo_encuesta'));
        } else {

            //Se envia un mensaje a otro lado porque la ficha ya se lleno
            return redirect()->route('Evaluacionrspa');
        }

    }

    public function Asignacion($user, $table1, $table2, $select1, $select2, $where)
    {

        if ($user->role_id == 1) {
            $encuesta = [1, 2, 3, 4, 5, 6, 7, 8];
            $ficha    = ficha::where('users_id', $user->id)->get();
            if (count($ficha) == 0) {
                $fichas            = new ficha();
                $fichas->Numero    = uniqid();
                $fichas->users_id  = $user->id;
                $fichas->confirmed = 0;
                $fichas->save();
            }

            for ($j = 0; $j < count($encuesta); $j++) {
                $table_id = DB::table($table1)->select($select1)->where('encuesta_id', $encuesta[$j])->get();
                for ($q = 0; $q < count($table_id); $q++) {
                    $matriz_pregu[$j][$q] = $table_id[$q]->{$select1};
                }
                $table_id = [];
            }
            for ($k = 0; $k < count($encuesta); $k++) {
                for ($w = 0; $w < count($matriz_pregu[$k]); $w++) {
                    $matriz[$k][$w] = DB::table($table2)->select($select2)->where($where, $matriz_pregu[$k][$w])->get()->toArray()[0];
                }
            }
            return $matriz;

        }
    }

    public function Store(Request $request)
    {

        $ValorRadio = [];
        $user       = Auth::user(); //->id_ficha
        $preguntas  = $this->Asignacion($user, 'detalle_encuesta', 'pregunta', 'pregunta_id', 'id_pregunta', 'id_pregunta');

        /*El Id que el usuario ah fichas que hemos llenado*/
        $id_ficha = $user->ficha->pluck('id_ficha')->all();

        /*Nota trabajo en el detalle_ficha_encues*/
        /*Obtener los Id de las encuestas que trabajamos*/
        for ($w = 0; $w < count($preguntas); $w++) {
            $id_encuesta[$w] = detalle_encuesta::select('encuesta_id')->whereIn('pregunta_id', array_pluck($preguntas[$w], 'id_pregunta'))->distinct()->get()->pluck('encuesta_id')->all();
        }
        $id_encuesta = array_flatten($id_encuesta);
        /*El valor de los radio escogido*/
        for ($i = 0; $i < count($preguntas); $i++) {
            for ($j = 0; $j < count($preguntas[$i]); $j++) {
                $ValorRadio[$i][$j] = $request->input('customRadio' . $i . $j);
            }
        }

        //Guardas la ficha

        for ($r = 0; $r < count($preguntas); $r++) {
            for ($g = 0; $g < count($preguntas[$r]); $g++) {
                $detalle_ficha                 = new detalle_fichas();
                $detalle_ficha->ficha_id       = $id_ficha[0];
                $detalle_ficha->alternativa_id = $ValorRadio[$r][$g];
                $detalle_ficha->pregunta_id    = $preguntas[$r][$g]->id_pregunta;
                $detalle_ficha->encuesta_id    = $id_encuesta[$r];
                $detalle_ficha->save();
            }
        }
        //Actualizar Ficha
        $ficha_update            = ficha::where('users_id', $user->id)->first();
        $ficha_update->users_id  = $user->id;
        $ficha_update->confirmed = 1;
        $ficha_update->update();

        return redirect()->route('Evaluacionrspa')
            ->with([
                'message' => 'Los datos de su encuesta han sido guardados correctamente!!',
            ]);
    }

    public function Evaluacion_rspa()
    {
        $Analisis = $this->Evaluacion_rstd();
        //dd($Analisis);
        return view('Empleado.FichaRspta', compact('Analisis'));
    }

    public function Evaluacion_rstd()
    {
        $encuesta       = [1, 2, 3, 4, 5, 6, 7, 8];
        $Max            = 0;
        $Min            = 0;
        $SubMax         = 0;
        $SubMax         = 0;
        $SumTotal       = 0;
        $Limit          = 0;
        $resultadoFinal = "";
        $EnsEvaTotal    = [];
        $pesosAlter     = [];
        $user           = Auth::user();
        $preguntas      = $this->Asignacion($user, 'detalle_encuesta', 'pregunta', 'pregunta_id', 'id_pregunta', 'id_pregunta');
        $alternativas   = $this->Asignacion($user, 'detalle_alternativa', 'alternativa', 'alternativa_id', '*', 'id_alternativa');
        /*El Id que el usuario ah fichas que hemos llenado*/
        $id_ficha = $user->ficha->pluck('id_ficha')->all();
        /*Buscamos y obtenemos todo el resultado de la ficha*/
        $FichaResultados = detalle_fichas::where('ficha_id', $id_ficha[0])->get();

        //Analisis de datos por encuesta
        for ($r = 0; $r < count($preguntas); $r++) {
            /*Las alternativas llenadas en esa encuesta*/
            $SubMin    = count($preguntas[$r]);
            $SubMax    = count($alternativas[$r]) * $SubMin;
            $Limit     = $SubMax - round(count($preguntas[$r]) * 0.5);
            $AlterMarc = $FichaResultados->where('encuesta_id', $encuesta[$r])->pluck('alternativa_id')->all();

            for ($g = 0; $g < count($AlterMarc); $g++) {
                $pesosAlter = alternativa::where('id_alternativa', $AlterMarc[$g])->get()->pluck('peso')->all()[0];
                $SumTotal += $pesosAlter;
            }

            switch ($SumTotal) {
                case ($SumTotal < (intdiv(($SubMin + $SubMax), 2))):
                    $EnsEvaTotal[$r] = 1;
                    //dd("Malo");
                    break;

                case ($SumTotal >= (intdiv(($SubMin + $SubMax), 2)) and $SumTotal < $Limit):
                    $EnsEvaTotal[$r] = 2;
                    // dd("Bueno");
                    break;

                case ($SumTotal >= $Limit):
                    $EnsEvaTotal[$r] = 3;
                    //dd("Muy Bueno");
                    break;

                default:
                    # code...
                    break;
            }
            $pesosAlter = [];
            $AlterMarc  = [];
            $SumTotal   = 0;
        }

        //dd($EnsEvaTotal);
        //Analisis de datos Total
        $Min      = count($preguntas);
        $Max      = $Min * 3;
        $Limit    = $Max - round($Min * 0.5);
        $SumTotal = 0;
        for ($i = 0; $i < count($preguntas); $i++) {
            $SumTotal += $EnsEvaTotal[$i];
        }
        // var_dump($Min);
        // var_dump($Max);
        // var_dump($SumTotal);
        switch ($SumTotal) {
            case ($SumTotal < (intdiv(($Min + $Max), 2))):
                $resultadoFinal = "Deficiente";
                break;

            case ($SumTotal >= (intdiv(($Min + $Max), 2)) and $SumTotal < $Limit):
                $resultadoFinal = "Bueno";
                break;

            case ($SumTotal >= $Limit):
                $resultadoFinal = "Muy Bueno";
                break;

            default:
                # code...
                break;
        }
        //dd($resultadoFinal);
        //return view('Empleado.FichaResultado',compact('resultadoFinal'));
        // return response()->json($resultadoFinal);
        return $resultadoFinal;
    }

    public function Evaluacion_reporte()
    {

        $Rpta           = "Jose";
        $encuesta       = [1, 2, 3, 4, 5, 6, 7, 8];
        $Max            = 0;
        $Min            = 0;
        $SubMax         = 0;
        $SubMax         = 0;
        $SumTotal       = 0;
        $Limit          = 0;
        $resultadoFinal = "";
        $EnsEvaTotal    = [];
        $pesosAlter     = [];
        $sumporencuesta = [0, 0, 0, 0, 0, 0, 0, 0];
        $users          = User::all();
        //dd($user);
        foreach ($users as $user) {

            $preguntas    = $this->Asignacion($user, 'detalle_encuesta', 'pregunta', 'pregunta_id', 'id_pregunta', 'id_pregunta');
            $alternativas = $this->Asignacion($user, 'detalle_alternativa', 'alternativa', 'alternativa_id', '*', 'id_alternativa');
            /*El Id que el usuario ah fichas que hemos llenado*/
            if ($user->role_id == 2) {
                break;
            }
            $id_ficha = $user->ficha->pluck('id_ficha')->all();
            /*Buscamos y obtenemos todo el resultado de la ficha*/
            $FichaResultados = detalle_fichas::where('ficha_id', $id_ficha[0])->get();
            if (count($FichaResultados) == 0) {
                break;
            }
            //dd($FichaResultados);
            //Analisis de datos por encuesta
            if ($user->role_id == 2 || count($FichaResultados) == 0) {
                break;
            }
            for ($r = 0; $r < count($preguntas); $r++) {
                /*Las alternativas llenadas en esa encuesta*/
                $SubMin    = count($preguntas[$r]);
                $SubMax    = count($alternativas[$r]) * $SubMin;
                $Limit     = $SubMax - round(count($preguntas[$r]) * 0.5);
                $AlterMarc = $FichaResultados->where('encuesta_id', $encuesta[$r])->pluck('alternativa_id')->all();

                for ($g = 0; $g < count($AlterMarc); $g++) {
                    $pesosAlter = alternativa::where('id_alternativa', $AlterMarc[$g])->get()->pluck('peso')->all()[0];
                    $SumTotal += $pesosAlter;
                }
                switch ($SumTotal) {
                    case ($SumTotal < (intdiv(($SubMin + $SubMax), 2))):
                        // $EnsEvaTotal[$r]=1;
                        $EnsEvaTotal[$r] = $SumTotal;
                        //dd("Malo");
                        break;

                    case ($SumTotal >= (intdiv(($SubMin + $SubMax), 2)) and $SumTotal < $Limit):
                        // $EnsEvaTotal[$r]=2;
                        $EnsEvaTotal[$r] = $SumTotal;
                        // dd("Bueno");
                        break;

                    case ($SumTotal >= $Limit):
                        // $EnsEvaTotal[$r]=3;
                        $EnsEvaTotal[$r] = $SumTotal;
                        //dd("Muy Bueno");
                        break;

                    default:
                        # code...
                        break;
                }
                $pesosAlter = [];
                $AlterMarc  = [];
                $SumTotal   = 0;
            }
            // printf('</br>');
            // var_dump($EnsEvaTotal);
            // printf('</br>');
            //dd($EnsEvaTotal);
            for ($i = 0; $i < count($preguntas); $i++) {
                $SumTotal = $EnsEvaTotal[$i];
                $sumporencuesta[$i] += $SumTotal;
            }

        }
        //dd($sumporencuesta);

        return view('Reporte.ReporteDesempeño', compact('sumporencuesta'));
    }

}

//$ficha = new ficha();
// $ficha = ficha::where('users_id',$user->id)->get();
// $Temporal =new detalle_fich_encues();
// if(count($ficha)==0){
//     $ficha->Numero=1234;
//     $ficha->users_id=$user->role_id;
//     $ficha->save();
//     $ficha = ficha::where('users_id',$user->id)->get();

//     for ($i=0; $i < count($encuesta) ; $i++) {
//         $Temporal->ficha_id=$ficha->id_ficha;
//         $Temporal->encuesta_id=$encuesta[$i];
//         $Temporal->confirmed=false;
//         $Temporal->save();
//     }

// }
//     // $alternativa_id->each(function ($item, $key) {
//     //     printf("---/".$item->alternativa_id."---->".$key);
//     //     if($item->alternativa_id==2){
//     //         return false;
//     //     }
//     //     // return $sum;
//     // });
//->flatten()->all() ->flip()->all()->pluck('alternativa_id')->all()
// die();//->get()->toArray()[0]
//->get()->values()->all()
//pregunta::select('detalle')->where('id_pregunta',$matriz_pregu[$k][$w])->get();
