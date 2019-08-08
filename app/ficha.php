<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ficha extends Model
{
    protected $table="ficha";
    protected $primaryKey="id_ficha";

    public function detalle_fichas(){
    	return $this->hasMany('App\detalle_fichas','ficha_id');
    }
    public function detalle_fich_encues(){
    	return $this->hasMany('App\detalle_fich_encues','ficha_id');
    }
    public function users(){
    	return $this->belongsTo('App\User','users_id');
    }
}
