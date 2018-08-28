<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Encuesta;
use Carbon\Carbon;

class Registro extends Model
{
    protected $guarded = ['id_registro'];
    protected $fillable = [
    	'no_concesionario',
    	'empresa',
    	'razonsocial',
    	'nombre',
    	'apellido',
    	'apellidomaterno',
    	'sexo',
    	'lada',
    	'telefono1',
    	'ext1',
    	'lada_celular',
    	'lada3',
    	'celular',
    	'telefono3',
    	'lada4',
    	'telefono4',
    	'mail',
    	'mail2',
    	'nombre_contacto',
    	'apellido_contacto',
    	'apellido_materno_contacto',
    	'lada_contacto',
    	'telefono_contacto',
    	'nombremodelo',
    	'chasis',
    	'placa',
        'fechaservicio',
    	'tiposervicio',
    	'noorden',
    	'añomodelo',
    	'asesornombre',
    	'asesorapp',
    	'asesorapm',
    	'contacto',
    	'comentarios'];

    
    public static function saveRegistro($arrInfo)
    {
        //Verificamos que el el registro no se encuentre en la base de datos, si es así realiza un update.
        $registro = isset($arrInfo['id_registro']) ? self::find($arrInfo['id_registro']) : new self();
        #Fill relaciona los nombres de el array con los nombres de la base si son iguales los asigna para almacenarlos en la base de datos.
        $registro->fill($arrInfo);

        //Los archivos CSV traen un campo con la letra ñ como caracter especial que reconoce el array como un 0 por lo tanto ocupamos la posición con este nombre para evitar este error y la información de este campo se almacene en la base de datos.
        $registro->añomodelo = $arrInfo['0'];

        //Covertimos la fecha del CSV con el formato correcto
        $fechaServicio = Carbon::createFromFormat('d/m/Y', $arrInfo['fechaservicio']);
        

        //Guardamos la fecha convertida por Carbon en la base de datos
        $registro->fechaservicio = $fechaServicio;
        
        
        #Guardamos en la BD
        $registro->save();
        
        #Si el registro tiene tipo de servicio 8 no creamos su encuesta debido a que estas no se realizan
        if ($registro->tiposervicio!=8)
        {
            $encuesta = new Encuesta;
            $encuesta->id_registro = $registro->id;
            $encuesta->estado = 0;
            $encuesta->intento = 0;
            $encuesta->save();
        }
        return $registro;
    }
}