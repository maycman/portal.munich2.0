<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Pregunta;
use App\Respuesta;

class Encuesta extends Model
{
    #Le hacemos saber a laravel el id de la tabla
	protected $primaryKey = 'id_encuesta';

    #Declaramos los campos de la tabla para permitirles la asignación masiva
    protected $fillable = ['contactable','acepta','reprograma','fecha_reprograma','estado','intento','id_registro'];

    #Creamos una relación muchos a muchos (Encuestas - Preguntas)
    public function preguntas()
    {
    	return $this->belongsToMany('App\Pregunta');
    }

    #Creamos relación uno a muchos (Encuesta - Respuestas)
    public function respuestas()
    {
    	return $this->hasMany('App\Respuesta','id_encuesta');
    }

    #Metodo para guardar o editar uno encuesta.
    public static function saveEncuesta($arrInfo)
    {
    	#Revisamos si el array trae una encuesta para editar ó creamos una nueva
    	$encuesta = isset($arrInfo['id_encuesta']) ? self::find($arrInfo['id_encuesta']) : new self();


        #Comprobamos si existen intento de contactación y/o aumentamos el contador
        $encuesta->intento +=1;
        #Ahora verificamos si ya completo con todos los intentos de llamada
        ($encuesta->intento<2) ? $encuesta->estado=0 : $encuesta->estado=1;

    	#Verificamos si el cliente fue contactable
        if ($arrInfo->contactable == 'on')
        {
            #Verificamos si acepta o no la encuesta
            if($arrInfo->acepta == 'on')
            {
                #Ahora revisamos si la encuesta es reprogramada para poner el estado cero para reprogramar la llamada o ponemos 1 como encuesta completada
                ($arrInfo->reprograma == 'on') ? $encuesta->estado = 0 : $encuesta->estado = 1;
            }
            else
            {
                $encuesta->estado = 1;
            }
        }
        else
        {
            #Evaluamos el motivo de no contacto
            if ($arrInfo->contactable == 'Número no existe' || $arrInfo->contactable == 'Número equivocado')
            {
                $encuesta->estado = 1;
            }

            #Si no es contactable, mantenemos el estado a 0 de encuesta incompleta hasta que contesto o los intentos sean mas de 3
            $encuesta->estado=0;
        }

        #Guardamos los datos restantes de la encuesta
        $encuesta->contactable = $arrInfo->razon;
    	$encuesta->acepta = $arrInfo->acepta;
        $encuesta->reprograma = $arrInfo->butonReprograma;
        $encuesta->fecha_reprograma = $arrInfo->reprograma;
    	$encuesta->id_registro = $arrInfo->id_registro;
        $encuesta->save();


        $preguntas = Pregunta::where('origen','=','servicio')
        				->select('id_pregunta','pregunta')
        				->get();

        foreach ($preguntas as $key => $value)
        {
        	if(isset($arrInfo[$value->id_pregunta]))
        	{
        		$respuesta = [ 'id_encuesta' =>$encuesta->id_encuesta ];
        		$respuesta['id_pregunta'] = $value->id_pregunta;
        		$respuesta['respuesta'] = $arrInfo[$value->id_pregunta];
        		Respuesta::saveRespuesta($respuesta);
        	}
        }
    	return $encuesta;
    }
}