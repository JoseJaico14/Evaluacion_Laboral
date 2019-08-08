<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle_alternativa extends Model
{
    protected $table="detalle_alternativa";
    protected $primaryKey = "id_detalle_alternativa";
    public function alternativa(){
    	return $this->belongsTo('App\alternativa','alternativa_id');
    }
    public function encuesta(){
    	return $this->belongsTo('App\encuesta','encuesta_id');
    }
}
