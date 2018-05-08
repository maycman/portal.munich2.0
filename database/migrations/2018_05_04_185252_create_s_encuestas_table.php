<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_encuestas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('id_registro')->unsigned();
            $table->foreign('id_registro')->references('id_registro')->on('registros');
            $table->string('acepta', 10)->nullable();
            $table->string('reprograma', 10)->nullable();
            $table->string('fecha_reprograma', 50)->nullable();
            $table->string('p1', 10)->nullable();
            $table->string('p2', 10)->nullable();
            $table->string('p2a', 10)->nullable();
            $table->string('p2b', 10)->nullable();
            $table->string('p2c', 10)->nullable();
            $table->string('p2d', 10)->nullable();
            $table->string('p2e', 10)->nullable();
            $table->string('p2f', 10)->nullable();
            $table->string('p3', 10)->nullable();
            $table->string('disp_refacciones', 10)->nullable();
            $table->string('problema_no_determinado', 10)->nullable();
            $table->string('falla_de_nuevo', 10)->nullable();
            $table->string('trabajo_parcial', 10)->nullable();
            $table->string('taller_causo_problema', 10)->nullable();
            $table->string('taller_nego_problema', 10)->nullable();
            $table->string('taller_ocupado', 10)->nullable();
            $table->string('otro', 400)->nullable();
            $table->string('p4', 10)->nullable();
            $table->string('p4a', 10)->nullable();
            $table->string('p4b', 10)->nullable();
            $table->string('p4c', 10)->nullable();
            $table->string('p4d', 10)->nullable();
            $table->string('p5', 10)->nullable();
            $table->string('p5a', 10)->nullable();
            $table->string('p5b', 10)->nullable();
            $table->string('p5c', 10)->nullable();
            $table->string('p5d', 10)->nullable();
            $table->string('p6', 10)->nullable();
            $table->string('p6a', 400)->nullable();
            $table->string('p7', 10)->nullable();
            $table->string('comentarios', 400)->nullable();
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
        Schema::dropIfExists('s_encuestas');
    }
}
