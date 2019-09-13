<?php

namespace App\Http\Controllers;

use App\detalle_encuesta;
use App\detalle_fichas;
use App\ficha;
use App\Repositories\QueryGet;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FichaEvaluacion extends Controller
{
    protected $queryGet;
    public function __construct(QueryGet $queryGet)
    {
        $this->queryGet = $queryGet;
        $this->middleware('auth');
    }

    public function Evaluacion_view()
    {

        $User   = Auth::user();
        $Survey = $this->queryGet->getIdSurvey();
        if (!$this->queryGet->ConfirmationFile($User)) {

            $Questions         = $this->queryGet->getQuestions($User);
            $Assignment        = $this->queryGet->getAssignment($User);
            $DescriptionSurvey = $this->queryGet->getDescriptionSurvey($Survey);
            return view('Empleado.FichaEvaluacion', compact('Questions', 'Assignment', 'DescriptionSurvey'));
        } else {
            //Se envia un mensaje a otro lado porque la ficha ya se lleno
            return redirect()->route('Evaluacionrspa');
        }

    }

    public function Store(Request $request)
    {

        $ValorRadio = [];
        $User       = Auth::user();
        $Questions  = $this->queryGet->getQuestions($User);
        /*El Id que el usuario ah fichas que hemos llenado*/
        $Id_Ficha = $User->ficha->pluck('id_ficha')->all();
        /*Nota trabajo en el detalle_ficha_encues*/
        /*Obtener los Id de las encuestas que trabajamos*/
        for ($w = 0; $w < count($Questions); $w++) {
            $Id_Survey[$w] = detalle_encuesta::select('encuesta_id')->whereIn('pregunta_id', array_pluck($Questions[$w], 'id_pregunta'))->distinct()->get()->pluck('encuesta_id')->all();
        }
        $Id_Survey = array_flatten($Id_Survey);
        //Guardas la ficha
        for ($r = 0; $r < count($Questions); $r++) {
            for ($g = 0; $g < count($Questions[$r]); $g++) {
                $Detail_File                 = new detalle_fichas();
                $Detail_File->ficha_id       = $Id_Ficha[0];
                $Detail_File->alternativa_id = $request->input('customRadio' . $r . $g);
                $Detail_File->pregunta_id    = $Questions[$r][$g]->id_pregunta;
                $Detail_File->encuesta_id    = $Id_Survey[$r];
                $Detail_File->save();
            }
        }
        //Actualizar Ficha
        $File_Update            = ficha::where('users_id', $User->id)->first();
        $File_Update->users_id  = $User->id;
        $File_Update->confirmed = 1;
        $File_Update->update();

        return redirect()->route('Evaluacionrspa')
            ->with([
                'message' => 'Los datos de su encuesta han sido guardados correctamente!!',
            ]);
    }

    public function Evaluacion_rspa()
    {
        $Analisis = $this->Evaluacion_rstd();
        return view('Empleado.FichaRspta', compact('Analisis'));
    }

    public function Evaluacion_rstd()
    {
        $Survey      = $this->queryGet->getIdSurvey();
        $Max         = 0;
        $Min         = 0;
        $SubMax      = 0;
        $SubMax      = 0;
        $SumTotal    = 0;
        $Limit       = 0;
        $FinalScore  = "";
        $EnsEvaTotal = [];
        $Weight      = [];
        $ArrayAssig  = ["Deficiente", "Bueno", "Muy Bueno"];
        $ArrayOption = [1, 2, 3];
        $User        = Auth::user();
        $Questions   = $this->queryGet->getQuestions($User);
        $Assignment  = $this->queryGet->getAssignment($User);
        /*El Id que el usuario ah fichas que hemos llenado*/
        $id_ficha = $User->ficha->pluck('id_ficha')->all();
        /*Buscamos y obtenemos todo el resultado de la ficha*/
        $FichaResultados = detalle_fichas::where('ficha_id', $id_ficha[0])->get();

        //Analisis de datos por encuesta
        for ($r = 0; $r < count($Questions); $r++) {
            /*Las alternativas llenadas en esa encuesta*/
            $SubMin          = count($Questions[$r]);
            $SubMax          = count($Assignment[$r]) * $SubMin;
            $Limit           = $SubMax - round(count($Questions[$r]) * 0.5);
            $SumTotal        = $this->queryGet->SumTotal($Survey[$r], $FichaResultados, true);
            $EnsEvaTotal[$r] = $this->queryGet->SwitchAssignment($SumTotal, $SubMin, $SubMax, $Limit, $ArrayOption);
            $Weight          = [];
            $AlterMarc       = [];
            $SumTotal        = 0;
        }
        //Analisis de datos Total
        $Min      = count($Questions);
        $Max      = $Min * 3;
        $Limit    = $Max - round($Min * 0.5);
        $SumTotal = 0;
        for ($i = 0; $i < count($Questions); $i++) {
            $SumTotal += $EnsEvaTotal[$i];
        }
        $FinalScore = $this->queryGet->SwitchAssignment($SumTotal, $SubMin, $SubMax, $Limit, $ArrayAssig);
        return $FinalScore;
    }

}

//->flatten()->all() ->flip()->all()->pluck('alternativa_id')->all()
// die();//->get()->toArray()[0]
//->get()->values()->all()
//pregunta::select('detalle')->where('id_pregunta',$matriz_pregu[$k][$w])->get();
