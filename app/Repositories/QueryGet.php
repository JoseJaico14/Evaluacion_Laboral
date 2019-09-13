<?php

namespace App\Repositories;

use App\alternativa;
use App\encuesta;
use App\ficha;
use Illuminate\Support\Facades\DB;

class QueryGet
{

    public function __construct()
    {
        # code...
    }
    public function getQuestions($User)
    {
        return $this->QueryAssignment($User, 'detalle_encuesta', 'pregunta', 'pregunta_id', '*', 'id_pregunta');
    }
    public function getAssignment($User)
    {
        return $this->QueryAssignment($User, 'detalle_alternativa', 'alternativa', 'alternativa_id', '*', 'id_alternativa');
    }
    public function getDescriptionSurvey($Survey)
    {
        return encuesta::select('descripcion')->whereIn('id_encuesta', $Survey)->get();
    }
    public function UserRole($User)
    {
        if ($User->role_id == 1) {
            return true;
        }
        return false;
    }
    public function getIdSurvey()
    {
        return encuesta::select('id_encuesta')->pluck('id_encuesta')->all();
    }
    public function QueryAssignment($User, $TableA, $TableB, $SelectA, $SelectB, $Where)
    {

        if ($this->UserRole($User)) {
            $Survey = $this->getIdSurvey();
            if (!ficha::where('users_id', $User->id)->exists()) {
                $Fileas            = new ficha();
                $Fileas->Numero    = uniqid();
                $Fileas->users_id  = $User->id;
                $Fileas->confirmed = 0;
                $Fileas->save();
            }

            for ($j = 0; $j < count($Survey); $j++) {
                $ID_TABLE = DB::table($TableA)->select($SelectA)->where('encuesta_id', $Survey[$j])->get();
                for ($q = 0; $q < count($ID_TABLE); $q++) {
                    $MATRIZ_QUEST[$j][$q] = $ID_TABLE[$q]->{$SelectA};
                }
                $ID_TABLE = [];
            }
            for ($k = 0; $k < count($Survey); $k++) {
                for ($w = 0; $w < count($MATRIZ_QUEST[$k]); $w++) {
                    $MATRIZ[$k][$w] = DB::table($TableB)->select($SelectB)->where($Where, $MATRIZ_QUEST[$k][$w])->get()->toArray()[0];
                }
            }
            return $MATRIZ;

        }
    }
    public function ConfirmationFile($User)
    {
        //->exists() Saber si el usuario esta asignado a una ficha
        $Ficha = $User->ficha;
        if ($Ficha->contains('confirmed', 1)) {
            return true;
        }
        return false;
    }
    public function SwitchAssignment($SumaTotal, $SubMin, $SubMax, $Limit, $ArrayHelp)
    {

        switch ($SumaTotal) {
            case ($SumaTotal < (intdiv(($SubMin + $SubMax), 2))):
                $Result = $ArrayHelp[0];
                break;

            case ($SumaTotal >= (intdiv(($SubMin + $SubMax), 2)) and $SumaTotal < $Limit):
                $Result = $ArrayHelp[1];
                break;
            case ($SumaTotal >= $Limit):
                $Result = $ArrayHelp[2];
                break;

            default:
                # code...
                break;
        }
        return $Result;
    }
    public function SumTotal($Survey, $FichaResultados, $Controller = false)
    {
        $Total      = 0;
        $SumTotl    = 0;
        $pesosAlter = [];
        $AlterMarc  = $FichaResultados->where('encuesta_id', $Survey)->pluck('alternativa_id')->all();
        for ($g = 0; $g < count($AlterMarc); $g++) {
            $pesosAlter = alternativa::where('id_alternativa', $AlterMarc[$g])->get()->pluck('peso')->all()[0];
            $SumTotl += $pesosAlter;
        }
        if ($Controller) {
            return $SumTotl;
        }
        $Total = $SumTotl / count($AlterMarc);
        return $Total;
    }
}
