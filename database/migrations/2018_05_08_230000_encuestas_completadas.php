<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EncuestasCompletadas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('completadas',function(Blueprint $table){
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_registro')->unsigned();
            $table->foreign('id_registro')->references('id_registro')->on('registros');
            $table->integer('id_s_encuestas')->unsigned();
            $table->foreign('id_s_encuestas')->references('id')->on('s_encuestas');
            $table->string('estado')->nullable();
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
        Schema::dropIfExists('completadas');
    }
}
