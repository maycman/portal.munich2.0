<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autos', function (Blueprint $table) {
            $table->increments('id_auto');
            $table->date('fecha_llegada');
            $table->string('chasis')->unique();
            $table->string('tipo_auto');
            $table->string('ultimo_servicio')->nullable();
            $table->date('fecha_ultimo_servicio')->nullable();
            $table->string('servicio_pendiente')->nullable();
            $table->date('fecha_servicio_pendiente')->nullable();
            $table->string('proximo_servicio')->nullable();
            $table->date('fecha_proximo_servicio')->nullable();
            $table->string('tecnico')->nullable();
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
        Schema::drop('autos');
    }
}
