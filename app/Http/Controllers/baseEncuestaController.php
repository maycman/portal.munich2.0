<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\Input;
use Log;
use App\Registro;
use App\SEncuesta;
use App\Completadas;
use Excel;

class baseEncuestaController extends Controller
{
    public function index()
	{
		return view('callcenter/carga');
	}
	public function servicio(Request $request)
	{
		if(!\Input::file("base"))
    	{
        	return redirect('/')->with('error-message', 'Donde veo este prro mensaje?');
    	}
		$file = $request->file('base');
		$nombre = $file->getClientOriginalName();
		Excel::load($file, function($reader)
		{
			foreach ($reader->get() as $base)
			{
				$fuente = Registro::create([
					'concesionaria' => $base->no_concesionario,
					'empresa' =>$base->empresa,
					'razon_social' =>$base->razonsocial,
					'nombre' =>$base->nombre,
					'ap_paterno' =>$base->apellido,
					'ap_materno' =>$base->apellidomaterno,
					'sexo' =>$base->sexo,
					'estado' =>$base->estado,
					'ciudad' =>$base->ciudad,
					'calle' =>$base->calle,
					'num' =>$base->numero,
					'colonia' =>$base->colonia,
					'municipio' =>$base->delegacionmunicipio,
					'codigo_postal' =>$base->cp,
					'lada' =>$base->lada,
					'telefono1' =>$base->telefono1,
					'ext1' =>$base->ext1,
					'lada_cel' =>$base->lada_celular,
					'lada3' =>$base->lada3,
					'celular' =>$base->celular,
					'telefono3' =>$base->telefono3,
					'lada4' =>$base->lada4,
					'telefono4' =>$base->telefono4,
					'email' =>$base->mail,
					'email2' =>$base->mail2,
					'nombre_contacto' =>$base->nombre_contacto,
					'app_contacto' =>$base->apellido_contacto,
					'apm_contacto' =>$base->apellido_materno_contacto,
					'lada_contacto' =>$base->lada_contacto,
					'telofono_contacto' =>$base->telefono_contacto,
					'nombre_modelo' =>$base->nombremodelo,
					'modelo' =>$base->modelo,
					'chasis' =>$base->chasis,
					'placa' =>$base->placa,
					'fecha_entrada' =>$base->fechaentrada,
					'fecha_servicio' =>$base->fechaservicio,
					'KM' =>$base->km,
					'tipo_servicio' =>$base->tiposervicio,
					'costo' =>$base->costo,
					'no_orden' =>$base->noorden,
					'fecha_insercion' =>$base->fechainsercion,
					'ano_modelo' =>$base->añomodelo,
					'nombre_asesor' =>$base->asesornombre,
					'app_asesor' =>$base->asesorapp,
					'apm_asesor' =>$base->asesorapm,
					'tecnico' =>$base->tecnico,
					'contactable' =>$base->contacto,
					'cache' =>$base->comentarios
				]);
				$encuesta = new SEncuesta;
				$encuesta->save();
				Completadas::create([
					'id_registro' => $fuente->id,
					'id_s_encuestas' => $encuesta->id
				]);
			}
		});
		\Alert::message('Base de datos Cargada Correctamente', 'info');
		return view('callcenter/carga');
	}
}
