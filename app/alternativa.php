<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alternativa extends Model
{
    protected $table = "alternativa";
    protected $primaryKey = "id_alternativa";
    public function respuesta(){
    	return $this->hasMany('App\respuesta','alternativa_id');
    }
    public function detalle_alternativa(){
    	return $this->hasMany('App\detalle_alternativa','alternativa_id');
    }
}
