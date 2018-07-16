<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transaction;
use App\Encuesta;
use App\Registro;
use App\Pregunta;
use App\Respuesta;
class encuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Este constructor siempre te pide que tengas sesión iniciada
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin', 'viewer', 'service']);
        return view('callcenter/inicio');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicio()
    {
        #Esta es una simple consulta con scope
        $registro = Registro::ShowEncuestas()->paginate(50);
        $reprogramadas = Registro::ShowReprogramadas();
        return view('callcenter/servicio',compact('registro','reprogramadas'));
    }
    public function ventas()
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
        #Guardamos la encuesta
        Encuesta::saveEncuesta($request);
        $registro = Registro::ShowEncuestas()->paginate(50);
        $reprogramadas = Registro::ShowReprogramadas();
        
        \Alert::message('Encuesta Guardada Satisfactoriamente', 'info');
        return view('callcenter/servicio', compact('registro', 'reprogramadas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $consulta = Registro::where('id_registro',$id)->first();
        $encuesta = Encuesta::where('id_registro',$id)->first();
        return view("callcenter.llenado", compact('consulta','encuesta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
