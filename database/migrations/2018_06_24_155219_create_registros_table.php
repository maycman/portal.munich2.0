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
            $table->string('no_concesionario');
            $table->string('empresa')->nullable();
            $table->string('razonsocial')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('apellidomaterno')->nullable();
            $table->string('sexo')->nullable();
            $table->string('lada')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('ext1')->nullable();
            $table->string('lada_celular')->nullable();
            $table->string('lada3')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono3')->nullable();
            $table->string('lada4')->nullable();
            $table->string('telefono4')->nullable();
            $table->string('mail')->nullable();
            $table->string('mail2')->nullable();
            $table->string('nombre_contacto')->nullable();
            $table->string('apellido_contacto')->nullable();
            $table->string('apellido_materno_contacto')->nullable();
            $table->string('lada_contacto')->nullable();
            $table->string('telefono_contacto')->nullable();
            $table->string('nombremodelo')->nullable();
            $table->string('chasis');
            $table->string('placa')->nullable();;
            $table->string('tiposervicio');
            $table->string('noorden');
            $table->string('añomodelo')->nullable();
            $table->string('asesornombre');
            $table->string('asesorapp');
            $table->string('asesorapm');
            $table->string('contacto');
            $table->string('comentarios')->nullable();
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
        Schema::dropIfExists('registros');
    }
}
