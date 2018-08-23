<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Pregunta;
use App\Respuesta;
use App\Registro;

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

    public static function showEncuestas()
    {
        //Traemos todos los registros que no sean tipo de servicio interno (8), ya que solo queremos registros de clientes. Tambien buscamos que tengan encuesta contestada y con estado 0 ya que este estado indica que la encuesta esta completada o no, a su vez verificamos que no este reprogramada.
        $registros = DB::table('encuestas')
            ->join('registros', function($join){
                $join->on('encuestas.id_registro','=','registros.id_registro')
                ->where('registros.tiposervicio','!=','8');
            })
            ->where('encuestas.estado',0)
            ->where('encuestas.reprograma',null)
            ->select(
                'encuestas.intento',
                'encuestas.updated_at',
                'registros.id_registro',
                'registros.no_concesionario',
                'registros.empresa',
                'registros.razonsocial',
                'registros.nombre',
                'registros.apellido',
                'registros.apellidomaterno',
                'registros.sexo',
                'registros.lada',
                'registros.telefono1',
                'registros.ext1',
                'registros.lada_celular',
                'registros.lada3',
                'registros.celular',
                'registros.telefono3',
                'registros.lada4',
                'registros.telefono4',
                'registros.mail',
                'registros.mail2',
                'registros.nombre_contacto',
                'registros.apellido_contacto',
                'registros.apellido_materno_contacto',
                'registros.lada_contacto',
                'registros.telefono_contacto',
                'registros.nombremodelo',
                'registros.chasis',
                'registros.placa',
                'registros.fechaservicio',
                'registros.tiposervicio',
                'registros.noorden',
                'registros.añomodelo',
                'registros.asesornombre',
                'registros.asesorapp',
                'registros.asesorapm',
                'registros.contacto',
                'registros.comentarios'
            )
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
        ->orderBy('registros.id_registro','DESC')
        ->get();

        return $query;
    }

    #Metodo para guardar o editar uno encuesta.
    public static function saveEncuesta($arrInfo)
    {
    	#Revisamos si el array trae una encuesta para editar ó creamos una nueva
    	$encuesta = isset($arrInfo['id_encuesta']) ? self::find($arrInfo['id_encuesta']) : new self();

        #Aumentamos el contador de intentos de llamada
        $encuesta->intento +=1;

        #Verificamos si ya completo con todos los intentos de llamada 
        if($encuesta->intento<3)
        {
            #dd("Encuesta menor a 3 intentos");
            #Verificamos si el cliente fue contactable
            if ($arrInfo->contactable == 'on')
            {
                #dd("Es contactable");
                #Verificamos si acepta o no la encuesta
                if($arrInfo->acepta == 'on')
                {
                    #dd("Acepta la encuesta");
                    #Ahora revisamos si la encuesta es reprogramada para poner el estado cero para reprogramar la llamada o ponemos 1 como encuesta completada
                    ($arrInfo->butonReprograma == 'on') ? $encuesta->estado = 0 : $encuesta->estado = 1;
                }
                else
                {
                    #dd("No acepta la encuesta");
                    #No acepta la encuesta, colocamos el estado 1 de encuesta completada.
                    $encuesta->estado = 1;
                }
            }
            else
            {
                #dd("No es contactable");
                #No se contacto el cliente, evaluamos el motivo de no contacto
                if ($arrInfo->razon == 'Número no existe' || $arrInfo->razon == 'Número equivocado')
                {
                    #dd("No existe o es equivocado");
                    #Colocamos el estado 1 de encuesta completada.
                    $encuesta->estado = 1;
                }
                else
                {
                    #dd("buzon u otro de los valores");
                    #Si no es contactable, mantenemos el estado a 0 de encuesta incompleta hasta que contesto o los intentos sean mas de 3
                    $encuesta->estado=0;
                }
            }
        }
        else
        {
            #dd("Ya no hay mas intentos");
            #Colocamos el estado 1 de encuesta completada.
            $encuesta->estado=1;
        }
        

        #Guardamos los datos restantes de la encuesta
        $encuesta->contactable = $arrInfo->razon;
    	$encuesta->acepta = $arrInfo->acepta;
        #Verificamos que la encuesta este reprogramada o no
        ($encuesta->reprograma==null) ? $encuesta->reprograma = $arrInfo->butonReprograma : $encuesta->fecha_reprograma=$encuesta->fecha_reprograma;
        #Si esta reprogramada mantenemos los datos si no reescribimos los datos
        ($encuesta->fecha_reprograma==null) ?  $encuesta->fecha_reprograma = $arrInfo->reprograma: $encuesta->fecha_reprograma=$encuesta->fecha_reprograma;
    	$encuesta->id_registro = $arrInfo->id_registro;
        $encuesta->save();


        #Consultamos todas las preguntas
        $preguntas = Pregunta::where('origen','=','servicio')
        				->select('id_pregunta','pregunta')
        				->get();

        #Ahora recorremos las preguntas mientras las contestamos
        foreach ($preguntas as $key => $value)
        {
            #Buscamos el nombre (ID numerico de la pregunta en nuestro request de la encuesta)
        	if(isset($arrInfo[$value->id_pregunta]))
        	{
                #Creamos un array con la posición id_encuesta colocando el ID de la encuesta que guardamos arriba
        		$respuesta = [ 'id_encuesta' =>$encuesta->id_encuesta ];

                #Creamos la posición id_pregunta en la cual asignamos el ID de la pregunta que recorremos
        		$respuesta['id_pregunta'] = $value->id_pregunta;

                #Creamos la posición respuesta y respondemos con la respuesta que trae el request con el nombre (ID numerico de la pregunta)
        		$respuesta['respuesta'] = $arrInfo[$value->id_pregunta];

                #Guardamos la respuesta
        		Respuesta::saveRespuesta($respuesta);
        	}
        }
    	return $encuesta;
    }
}