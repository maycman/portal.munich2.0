<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Illuminate\Support\Facades\Input;
use App\Registro;
use Excel;

class baseEncuestaController extends Controller
{
	//Este constructor siempre te pide que tengas sesión iniciada
	public function __construct()
    {
        $this->middleware('auth');
    }
    //Este metodo te envia a la vista para cargala base
    public function index()
	{
		$title = 'Carga De CSV Delimitado Por Comas';
		return view('callcenter/carga', compact('title'));
	}
	//Aqui se carga la base directo del CSV a la Base de datos
	public function servicio(Request $request)
	{
		$title = 'Carga De CSV Delimitado Por Comas';
		//Verificamos que el Input no se encuentre vacio
		if(!\Input::file("base"))
    	{
        	return redirect('/', compact('title'))->with('error-message', 'No se recibio un input tipo File');
    	}

		//Obtenemos el archivo en una variable para manipularlo mas adelante
		$file = $request->file('base');

		//Obtenemos el nombre del archivo
		$nombre = $file->getClientOriginalName();

		//Verificamos que sea un archivo CSV
		$array = explode(".", $nombre);
		#$array[0]; // Nombre sin extensión
		#$array[1]; // Extensión
		if($array[1]=='csv'||$array=='CSV')
		{
			//Utilizamos el Facade Excel para importar los datos del CSV
			Excel::load($file, function($reader)
			{
				//Recorremos la colección de datos del CSV
				foreach ($reader->get() as $base)
				{
					//Importamos los datos del CSV a la Base de datos y al mismo tiempo convertimos la colección $base en un array con el metodo ->all()
					Registro::saveRegistro($base->all());
				}
			});

			//Creamos una alerta para la vista
			\Alert::message('Base de datos '.$nombre.' Cargada Correctamente', 'info');
			return view('callcenter/carga', compact('title'));
		}
		else
		{
			//Creamos una alerta para la vista indicando que el archivo cargado no es correcto
			\Alert::message('Archivo incorrecto '.$nombre.' no es un CSV delimitado por comas', 'danger');
			return view('callcenter/carga', compact('title'));
		}
	}
}
