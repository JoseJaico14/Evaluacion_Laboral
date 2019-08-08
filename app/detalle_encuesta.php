<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_encuesta extends Model
{
    protected $table="detalle_encuesta";
    protected $primaryKey="id_detalle_encuesta";

    public function encuesta(){
    	return $this->belongsTo('App\encuesta','encuesta_id');
    }
    public function pregunta(){
    	return $this->belongsTo('App\pregunta','pregunta_id');
    }
}
