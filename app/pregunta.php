<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pregunta extends Model
{
    protected $table="pregunta";
    protected $primaryKey="id_pregunta";

    public function detalle_encuesta(){
    	return $this->hasMany('App\detalle_encuesta','pregunta_id');
    }
     public function respuesta(){
    	return $this->hasMany('App\respuesta','pregunta_id');
    }
}
