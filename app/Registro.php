<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registro extends Model
{
    protected $fillable = [
    	'concesionaria',
    	'empresa',
    	'razon_social',
    	'nombre',
    	'ap_paterno',
    	'ap_materno',
    	'sexo',
    	'estado',
    	'ciudad',
    	'calle',
    	'num',
    	'colonia',
    	'municipio',
    	'codigo_postal',
    	'lada',
    	'telefono1',
    	'ext1',
    	'lada_cel',
    	'lada3',
    	'celular',
    	'telefono3',
    	'lada4',
    	'telefono4',
    	'email',
    	'email2',
    	'nombre_contacto',
    	'app_contacto',
    	'apm_contacto',
    	'lada_contacto',
    	'telofono_contacto',
    	'nombre_modelo',
    	'modelo',
    	'chasis',
    	'placa',
    	'fecha_entrada',
    	'fecha_servicio',
    	'KM',
    	'tipo_servicio',
    	'costo',
    	'no_orden',
    	'fecha_insercion',
    	'ano_modelo',
    	'nombre_asesor',
    	'app_asesor',
    	'apm_asesor',
    	'tecnico',
    	'contactable',
    	'cache'];

    public function scopeId($query, $id)
    {
        #dd('scope: '. $id);
        $query->where('id_registro',$id)->paginate(10);
    }
}
