<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;
use Barryvdh\DomPDF\Facade as PDF;
use App\Transaction;
use App\Registro;
use App\SEncuesta;
use App\Completadas;

class reportesController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function servicio(Request $request)
    {
    	/*$response = DB::table('completadas')
            ->join('registros', function ($join){
                $join->on('completadas.id_registro', '=', 'registros.id_registro')
                #Traemos todas las encuestas que no estan completadas.
                ->where('completadas.estado', '!=', null);
                #El tipo de servicio 8 son Ordenes internas y estas se excluyen.
                #->where('registros.tipo_servicio', '!=', '8');
            })
            ->join('s_encuestas', function ($join){
                $join->on('completadas.id_s_encuestas', '=', 's_encuestas.id')
                    #Traemos todas encuestas que aun no son reprogramadas
                    ->where('s_encuestas.reprograma', '=', null);
            })
            ->select('registros.*')
            ->orderBy('registros.id_registro', 'DESC')
            ->get();


    	$data = \Lava::DataTable();

    	$data->addStringColumn('Reasons')
        	->addNumberColumn('Percent')
        	->addRow(['Contactados', 89])
        	->addRow(['No Contactados', 11]);

		\Lava::DonutChart('contactados', $data, [
    		'title' => 'Clientes Contactados'
		]);
        */
    	$registro = DB::table('registros')->select('*')->paginate(50);
    	return view('/callcenter/reportesServicio'/*, compact('registro')*/);

    	/*$pdf = PDF::loadView('/callcenter/reportesServicio', compact('registro'));

        return $pdf->download('reporte.pdf');*/
    }
    public function test(Request $request)
    {
        //
    }
}
