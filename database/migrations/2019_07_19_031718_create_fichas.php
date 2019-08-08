<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuesta',function(Blueprint $table){
                $table->increments('id_encuesta');
                $table->string('descripcion');
                $table->string('estado')->nullable();
        });
        Schema::create('ficha',function(Blueprint $table){
            $table->increments('id_ficha');
            $table->string('Numero',50)->nullable();
            $table->timestamps();
            $table->unsignedInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->boolean('confirmed');
            // $table->unsignedInteger('encuesta_id');
            // $table->foreign('encuesta_id')->references('id_encuesta')->on('encuesta');
        });
        // Schema::create('detalle_fich_encues',function(Blueprint $table){ 
        //     $table->increments('id_detalle_fich_encues');
        //     $table->unsignedInteger('ficha_id');
        //     $table->foreign('ficha_id')->references('id_ficha')->on('ficha');
        //     $table->unsignedInteger('encuesta_id');
        //     $table->foreign('encuesta_id')->references('id_encuesta')->on('encuesta');
        //     $table->boolean('confirmed');
        // });
        Schema::create('pregunta',function(Blueprint $table){
            $table->increments('id_pregunta');
            $table->string('detalle',400);
        });
        
        Schema::create('alternativa',function(Blueprint $table){
            $table->increments('id_alternativa');
            $table->string('alternativa',50);
            $table->integer('peso')->nullable();
            // $table->unsignedInteger('pregunta_id');
            // $table->foreign('pregunta_id')->references('id_pregunta')->on('pregunta');
        });
        Schema::create('detalle_alternativa',function(Blueprint $table){ 
            $table->increments('id_detalle_alternativa');
            $table->unsignedInteger('alternativa_id');
            $table->foreign('alternativa_id')->references('id_alternativa')->on('alternativa');
            $table->unsignedInteger('encuesta_id');
            $table->foreign('encuesta_id')->references('id_encuesta')->on('encuesta');
            $table->timestamps();
        });
        // Schema::create('respuesta',function(Blueprint $table){
        //     $table->increments('id_respuesta');
        //     // $table->string('respuesta',50);
        //     $table->unsignedInteger('pregunta_id');
        //     $table->foreign('pregunta_id')->references('id_pregunta')->on('pregunta');
        //     $table->unsignedInteger('alternativa_id');
        //     $table->foreign('alternativa_id')->references('id_alternativa')->on('alternativa');
        // });
        Schema::create('detalle_fichas',function(Blueprint $table){ 
            $table->increments('id_detalle_ficha');
            $table->unsignedInteger('ficha_id');
            $table->foreign('ficha_id')->references('id_ficha')->on('ficha');
            // $table->unsignedInteger('id_respuesta')->nullable();
            // $table->foreign('id_respuesta')->references('id_respuesta')->on('respuesta');
            $table->unsignedInteger('encuesta_id');
            $table->foreign('encuesta_id')->references('id_encuesta')->on('encuesta');
            $table->unsignedInteger('pregunta_id');
            $table->foreign('pregunta_id')->references('id_pregunta')->on('pregunta');
            $table->unsignedInteger('alternativa_id');
            $table->foreign('alternativa_id')->references('id_alternativa')->on('alternativa');
            $table->timestamps();
        });
        Schema::create('detalle_encuesta',function(Blueprint $table){ 
            $table->increments('id_detalle_encuesta');
            $table->unsignedInteger('encuesta_id');
            $table->foreign('encuesta_id')->references('id_encuesta')->on('encuesta');
            $table->unsignedInteger('pregunta_id');
            $table->foreign('pregunta_id')->references('id_pregunta')->on('pregunta');
             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::dropIfExists('fichas');
    }
}
