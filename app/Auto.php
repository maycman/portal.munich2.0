<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    protected $primaryKey = 'id_auto';
    protected $table = 'autos';
    protected $fillable = ['fecha_llegada','chasis','tipo_auto','ultimo_servicio','fecha_ultimo_servicio','servicio_pendiente','fecha_servicio_pendiente','proximo_servicio','fecha_proximo_servicio','tecnico'];
}
