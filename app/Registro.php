<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Encuesta;

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
    	'anomodelo',
    	'asesornombre',
    	'asesorapp',
    	'asesorapm',
    	'contacto',
    	'comentarios'];

    public static function showEncuestas()
    {
        //Traemos todos los registros que no sean tipo de servicio interno (8), ya que solo queremos registros de clientes. Tambien buscamos que tengan encuesta contestada y con estado 0 ya que este estado indica que la encuesta esta completada o no, a su vez verificamos que no este reprogramada.
        $registros = DB::table('registros')
            ->join('encuestas', function($join){
                $join->on('registros.id_registro','=','encuestas.id_registro')
                ->where('encuestas.estado',0)
                ->where('encuestas.reprograma',null);
            })
            ->where('registros.tiposervicio','!=','8')
            ->orderBy('registros.id_registro','DESC');

        return $registros;
    }
    public function scopeShowReprogramadas($query)
    {
        $query = DB::table('registros')->join('encuestas',function($join){
            $join->on('registros.id_registro','encuestas.id_registro')
            ->where('encuestas.reprograma','on')
            ->where('encuestas.estado',0);
        })
        ->where('registros.tiposervicio','!=','8')
        ->get();

        return $query;
    }
    public static function saveRegistro($arrInfo)
    {
        //Verificamos que el el registro no se encuentre en la base de datos, si es así realiza un update.
        $registro = isset($arrInfo['id_registro']) ? self::find($arrInfo['id_registro']) : new self();
        #Fill relaciona los nombres de el array con los nombres de la base si son iguales los asigna para almacenarlos en la base de datos.
        $registro->fill($arrInfo);

        //Los archivos CSV traen un campo con la letra ñ como caracter especial que reconoce el array como un 0 por lo tanto ocupamos la posición con este nombre para evitar este error y la información de este campo se almacene en la base de datos.
        $registro->añomodelo = $arrInfo['0'];
        
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