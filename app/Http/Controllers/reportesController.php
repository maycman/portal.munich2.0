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
        $di = $di->format('d/m/Y');
        $df = $df->format('d/m/Y');
        
        dd($di.'   '.$df);
        #Buscamos todos clientes que entraron a servicio
        $query = DB::table('registros')
            ->where('registros.fechaservicio', '>=', $di)
            ->where('registros.fechaservicio', '<=', $df)
            ->get();

        dd($query);
        #contamos cuantos clientes entraron
        $entrantes = count($query);


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

        
        #Sacamos el porcentaje de los datos
        $pcontactables = $contactables / $entrantes * 100;
        $pnocontactables = $nocontactables / $entrantes * 100;

        $data = \Lava::DataTable();
        $data->addStringColumn('Clientes')
            ->addNumberColumn('Percent')
            ->addRow(['Contactados', $contactables])
            ->addRow(['No Contactados', $nocontactables]);

        \Lava::DonutChart('contactados', $data, [
            'title' => 'Clientes Contactados '
        ]);

        $registro = DB::table('registros')->select('*')->paginate(50);
        return view('/callcenter/reportesServicio', compact('registro','entrantes','contactables','nocontactables'));

        /*$pdf = PDF::loadView('/callcenter/reportesServicio', compact('registro'));

        return $pdf->download('reporte.pdf');*/
    }
}