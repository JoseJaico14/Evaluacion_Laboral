<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_fichas extends Model
{
    protected $table="detalle_fichas";
    protected $primaryKey="id_detalle_ficha";

    public function encuesta(){
    	return $this->belongsTo('App\encuesta','encuesta_id');
    }
    // public function respuesta(){
    // 	return $this->belongsTo('App\respuesta','id_respuesta');
    // }
    public function ficha(){
    	return $this->belongsTo('App\ficha','ficha_id');
    }
    public function alternativa(){
     return $this->belongsTo('App\alternativa','alternativa_id');
    }
    public function pregunta(){
     return $this->belongsTo('App\pregunta','pregunta_id');
    }
}
