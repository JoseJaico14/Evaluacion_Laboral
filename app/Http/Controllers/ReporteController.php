<?php

namespace App\Http\Controllers;

use App\detalle_fichas;
use App\Repositories\QueryGet;
use App\User;

class ReporteController extends Controller
{

    protected $queryGet;
    public function __construct(QueryGet $queryGet)
    {
        $this->queryGet = $queryGet;
        $this->middleware('auth');
    }
    public function Evaluacion_reporte()
    {

        $Survey         = $this->queryGet->getIdSurvey();
        $SumTotal       = 0;
        $EnsEvaTotal    = [];
        $sumporencuesta = [0, 0, 0, 0, 0, 0, 0, 0];
        $Users          = User::all();

        foreach ($Users as $User) {

            $Questions = $this->queryGet->getQuestions($User);
            /*El Id que el usuario ah fichas que hemos llenado*/
            if ($User->role_id == 2) {
                break;
            }
            $id_ficha = $User->ficha->pluck('id_ficha')->all();
            /*Buscamos y obtenemos todo el resultado de la ficha*/
            $FichaResultados = detalle_fichas::where('ficha_id', $id_ficha[0])->get();
            if ($this->queryGet->ConfirmationFile($User)) {
                for ($r = 0; $r < count($Questions); $r++) {
                    $EnsEvaTotal[$r] = $this->queryGet->SumTotal($Survey[$r], $FichaResultados);
                }
                for ($i = 0; $i < count($Questions); $i++) {
                    $SumTotal = $EnsEvaTotal[$i];
                    $sumporencuesta[$i] += $SumTotal;
                }
                $SumTotal = 0;
            }

        }
        return view('Reporte.ReporteDesempeño', compact('sumporencuesta'));
    }
    public function LoadPDF($status)
    {
        // return view('Reporte.PDFReporteEmpleado', ['status' => $status]);
        //$pdf = PDF::loadView('Reporte.ReportePrueba', ['status' => $status]);
        $view = \View::make('Reporte.ReportePrueba', compact('status'))->render();
        $pdf  = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();
    }
}
