<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transaction;
use App\Auto;

class cuatroSemanasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $title = 'Servicio De 4 Semanas';
        $request->user()->authorizeRoles(['admin', 'viewer', 'sellers']);
        $datos =Auto::where('estado','')->orWhere('estado',null)->orderBy('id_auto', 'DESC')->paginate(50);
        return view("autos.list", compact('datos', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = 'Servicio De 4 Semanas';
        $fecha_llegada = formatDate($request->fecha_llegada);
        $fecha_ultimo_servicio = formatDate($request->fecha_ultimo_servicio);
        $fecha_servicio_pendiente = formatDate($request->fecha_servicio_pendiente);
        $fecha_proximo_servicio = formatDate($request->fecha_proximo_servicio);
        $repetidos = Auto::where('chasis',$request->chasis)->first();
        if ($repetidos==null)
        {}
        else
        {
            if ($repetidos->chasis==$request->chasis)
            {
                $datos =Auto::where('estado','')->orWhere('estado',null)->orderBy('id_auto', 'DESC')->paginate(50);
                \Alert::message('Error, número de serie duplicado', 'danger');
                return view('autos.list', compact('title'))->with('datos', $datos);
            }
        }
        $row = new Auto;
        $row->fecha_llegada = $fecha_llegada;
        $row->chasis = $request->chasis;
        $row->tipo_auto = $request->tipo_auto;
        $row->ultimo_servicio = $request->ultimo_servicio;
        $row->fecha_ultimo_servicio = $fecha_ultimo_servicio;
        $row->servicio_pendiente = $request->servicio_pendiente;
        $row->fecha_servicio_pendiente = $fecha_servicio_pendiente;
        $row->proximo_servicio = $request->proximo_servicio;
        $row->fecha_proximo_servicio = $fecha_proximo_servicio;
        $row->save();
        $datos =Auto::where('estado','')->orWhere('estado',null)->orderBy('id_auto', 'DESC')->paginate(50);
        \Alert::message('Nuevo auto cargado', 'info');
        return view('autos.list', compact('title'))->with('datos', $datos);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $req)
    {
        $title = 'Servicio De 4 Semanas';
        #dd($req);
        /*#Buscamos que el chasis y generamos la colección
        $datos = DB::table('autos')->where('chasis', 'like','%'.$req->chasis.'%')->get();

        #Usamos este metodo con first() al final para traer un array y validar que existe o no un registro
        $data = DB::table('autos')
            ->where('chasis', 'like','%'.$req->chasis.'%')
            ->first();
        if ($datos->id_auto<>null or $datos->id_auto<>"")
        {
            \Alert::message('Chasis encontrado', 'success');
        }
        else
        {
            \Alert::message('No encontrado', 'danger');
        }*/
        $datos =Auto::where('chasis', 'like','%'.$req->chasis.'%')->get();
        $q=null;
        foreach ($datos as $key)
        {
            $q=$key->id_auto;
        }
        if ($q<>null or $q<>"")
        {
            \Alert::message('Chasis encontrado', 'success');
        }
        else
        {
            \Alert::message('No encontrado', 'danger');
        }
        return view('autos.busqueda',compact('datos',  'title'));
    }
    public function result()
    {
        $title = 'Servicio De 4 Semanas';
        return view("autos.busqueda",compact('title'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Servicio De 4 Semanas';
        $registro = Auto::where('id_auto', $id)->first();
        return view('autos.edit', compact('registro', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $title = 'Servicio De 4 Semanas';
        $nuevaFechaLlegada = formatDate($request->fecha_llegada);
        $nuevoChasis = $request->chasis;
        $ultimo_servicio = $request->ultimo_servicio;
        $fecha_ultimo_servicio = formatDate($request->fecha_ultimo_servicio);
        $servicio_pendiente = $request->servicio_pendiente;
        $fecha_servicio_pendiente = formatDate($request->fecha_servicio_pendiente);
        $proximo_servicio = $request->proximo_servicio;
        $fecha_proximo_servicio = formatDate($request->fecha_proximo_servicio);
        $tecnico = $request->tecnico;

        //Database
        $id=$request->id_auto;
        $row = Auto::find($id);
        $row->fecha_llegada = $nuevaFechaLlegada;
        $row->chasis = $nuevoChasis;
        $row->ultimo_servicio = $ultimo_servicio;
        $row->fecha_ultimo_servicio = $fecha_ultimo_servicio;
        $row->servicio_pendiente = $servicio_pendiente;
        $row->fecha_servicio_pendiente = $fecha_servicio_pendiente;
        $row->proximo_servicio = $proximo_servicio;
        $row->fecha_proximo_servicio = $fecha_proximo_servicio;
        $row->tecnico = $tecnico;
        $row->save();
        $datos =Auto::where('estado','')->orWhere('estado',null)->orderBy('id_auto', 'DESC')->paginate(50);
        \Alert::message('Datos actualizados correctamente', 'success');
        return view('autos.list', compact('title'))->with('datos', $datos);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $title = 'Servicio De 4 Semanas';
        $row = Auto::find($id);
        $row->estado = "concluido";
        $row->save();
        $datos =Auto::where('estado','')->orWhere('estado',null)->orderBy('id_auto', 'DESC')->paginate(50);
        \Alert::message('Auto liberado', 'success');
        return view('autos.list', compact('title'))->with('datos', $datos);
    }
}