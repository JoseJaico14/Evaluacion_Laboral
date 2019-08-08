<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    protected $table="roles";
    protected $primaryKey="id";

    public function users(){
    	return $this->hasMany('App\User','role_id');
    }
}
