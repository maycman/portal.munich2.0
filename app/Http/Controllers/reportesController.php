<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Khill\Lavacharts\Lavacharts;
use Barryvdh\DomPDF\Facade as PDF;
use App\Transaction;
use App\Registro;
use App\Encuesta;
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
        #This is the Key!!
        $di = Carbon::parse($request->fechaInit);
        $df = Carbon::parse($request->fechaFin);
        $di = $di->format('d-m-Y');
        dd($di);




        $data = \Lava::DataTable();
        $data->addStringColumn('Reasons')
            ->addNumberColumn('Percent')
            ->addRow(['Contactados', 89])
            ->addRow(['No Contactados', 11]);

        \Lava::DonutChart('contactados', $data, [
            'title' => 'Clientes Contactados'
        ]);

        $registro = DB::table('registros')->select('*')->paginate(50);
        return view('/callcenter/reportesServicio'/*, compact('registro')*/);

        /*$pdf = PDF::loadView('/callcenter/reportesServicio', compact('registro'));

        return $pdf->download('reporte.pdf');*/
    }
}
