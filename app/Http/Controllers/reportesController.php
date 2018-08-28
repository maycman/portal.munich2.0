<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;
use Barryvdh\DomPDF\Facade as PDF;
use App\Transaction;
use App\Encuesta;
use App\Registro;
use App\Pregunta;
use Carbon\Carbon;

class reportesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function preparaReporte()
    {
    	return view('/callcenter/configReporteServicio');
    }
    public function xEncuesta()
    {}
    public function xRango(Request $request)
    {
        #Usamos carbon para setear las fechas y poder realizar busquedas
        $di = Carbon::parse($request->fechaInit);
        $df = Carbon::parse($request->fechaFin);
        #$di = $di->format('d/m/Y');
        #$df = $df->format('d/m/Y');
        

        #Buscamos todos clientes que entraron a servicio
        $query = DB::table('registros')
            ->where('registros.fechaservicio', '>=', $di)
            ->where('registros.fechaservicio', '<=', $df)
            ->get();

        
        #Si la busqueda no trae registros redireccionamos a la vista con un mensaje
        if(count($query)==0)
        {
            return view('/callcenter/sinDatos');
        }
        else
        {
            #Buscamos las encuestas ya contestadas
            $completadas = DB::table('registros')
                ->join('encuestas', function($join){
                    $join->on('registros.id_registro','encuestas.id_registro');
                })
                ->where('encuestas.estado','1')
                ->get();


            #Buscamos las encuestas ya contestadas
            $faltantes = DB::table('registros')
                ->join('encuestas', function($join){
                    $join->on('registros.id_registro','encuestas.id_registro');
                })
                ->where('encuestas.estado','0')
                ->get();


            #contamos cuantos clientes entraron, encuestas completadas y no completadas
            $entrantes = count($query);
            $ecompletadas = count($completadas);
            $enocompletadas = count($faltantes);

            #Buscamos en la colección cuantos clientes desean ser contactados, cuantos no contactados, las internas.
            $contactables = 0;
            $nocontactables = 0;
            $internas = 0;
            foreach($query as $key)
            {
                if ($key->contacto=="S")
                {
                    $contactables+=1;
                }
                else if($key->contacto=="N")
                {
                    $nocontactables+=1;
                }
                else if($key->tiposervicio == 8)
                {
                    $internas+=1;
                }
            }

            #Creamos la table de datos para Lavacharts y asi crear los graficos
            $data = \Lava::DataTable();
            $data->addStringColumn('Clientes')
                ->addNumberColumn('Percent')
                ->addRow(['Completadas', $ecompletadas])
                ->addRow(['Faltantes', $enocompletadas]);

            #Creamos el grafico DonutChart de Lavachart
            \Lava::DonutChart('contactados', $data, [
                'title' => 'Encuestas Completadas'
            ]);

            #Creamos un array con los datos para pasar una sola variable a la vista
            $data = array('entrantes' => $entrantes,'contactables' => $contactables,'nocontactables' => $nocontactables);

            return view('/callcenter/reportesServicio', compact('data'));


            /*$pdf = PDF::loadView('/callcenter/reportesServicio', compact('registro'));

            return $pdf->download('reporte.pdf');*/
        }
    }
}