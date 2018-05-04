<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->increments('id_registro');
            $table->string('concesionaria');
            $table->string('empresa')->nullable();
            $table->string('razon_social')->nullable();
            $table->string('nombre')->nullable();
            $table->string('ap_paterno')->nullable();
            $table->string('ap_materno')->nullable();
            $table->string('sexo')->nullable();
            $table->string('estado')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('calle')->nullable();
            $table->string('num')->nullable();
            $table->string('colonia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('lada')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('ext1')->nullable();
            $table->string('lada_cel')->nullable();
            $table->string('lada3')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono3')->nullable();
            $table->string('lada4')->nullable();
            $table->string('telefono4')->nullable();
            $table->string('email')->nullable();
            $table->string('email2')->nullable();
            $table->string('nombre_contacto')->nullable();
            $table->string('app_contacto')->nullable();
            $table->string('apm_contacto')->nullable();
            $table->string('lada_contacto')->nullable();
            $table->string('telofono_contacto')->nullable();
            $table->string('nombre_modelo')->nullable();
            $table->string('modelo');
            $table->string('chasis');
            $table->string('placa')->nullable();
            $table->string('fecha_entrada');
            $table->string('fecha_servicio');
            $table->string('KM');
            $table->string('tipo_servicio');
            $table->string('costo')->nullable();
            $table->string('no_orden');
            $table->string('fecha_insercion');
            $table->string('ano_modelo')->nullable();
            $table->string('nombre_asesor');
            $table->string('app_asesor');
            $table->string('apm_asesor');
            $table->string('tecnico')->nullable();
            $table->string('contactable');
            $table->string('cache')->nullable();
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
        Schema::drop('registros');
    }
}
