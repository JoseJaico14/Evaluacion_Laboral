<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\alternativa;
use App\encuesta;
use App\detalle_alternativa;
use App\roles;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function Evaluacion_view(){
       // $rol= roles::first();
        //$encuesta = encuesta::first();
        //$rs = detalle_alternativa::all();
        // dd($encuesta->id_encuesta);
        //$rspt = detalle_alternativa::select('alternativa_id')->where('encuesta_id',$encuesta->id_encuesta)->get();
        //$rse=$encuesta->detalle_alternativa;
        //$sum="";
        //foreach ($rse as $rs) {
       //     $sum.=$rs->alternativa_id;
      //  }

        //dd($rol->users);
        //dd($rspt);
        // return view('Empleado.FichaEvaluacion');
    }
}
