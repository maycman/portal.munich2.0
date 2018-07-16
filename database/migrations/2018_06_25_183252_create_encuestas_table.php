<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encuestas', function (Blueprint $table) {
            #$table->engine = 'InnoDB';
            $table->increments('id_encuesta');
            $table->string('contactable')->nullable();
            $table->string('acepta', 10)->nullable();
            $table->string('reprograma', 10)->nullable();
            $table->string('fecha_reprograma', 50)->nullable();
            $table->integer('estado');
            $table->integer('intento');
            $table->integer('id_registro')->unsigned();
            $table->foreign('id_registro')->references('id_registro')->on('registros');
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
        Schema::dropIfExists('encuestas');
    }
}
