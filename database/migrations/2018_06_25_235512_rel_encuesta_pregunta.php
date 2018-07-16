<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelEncuestaPregunta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel_encuesta_pregunta', function (Blueprint $table) {
            $table->increments('id_rel');
            $table->integer('id_encuesta')->unsigned();
            $table->foreign('id_encuesta')->references('id_encuesta')->on('encuestas');
            $table->integer('id_pregunta')->unsigned();
            $table->foreign('id_pregunta')->references('id_pregunta')->on('preguntas');
            $table->string('respuesta')->nullable();
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
        Schema::dropIfExists('rel_encuesta_pregunta');
    }
}
