<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class encuesta extends Model
{
    protected $table = "encuesta";
    protected $primaryKey = "id_encuesta";
    public function detalle_alternativa(){
    	return $this->hasMany('App\detalle_alternativa','encuesta_id');
    }
    public function detalle_fichas(){
    	return $this->hasMany('App\detalle_fichas','encuesta_id');
    }
    public function detalle_encuesta(){
    	return $this->hasMany('App\detalle_encuesta','encuesta_id');
    }
    public function detalle_fich_encues(){
    	return $this->hasMany('App\detalle_fich_encues','encuesta_id');
    }
}
