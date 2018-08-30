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
        $title = 'Call Center';
        $request->user()->authorizeRoles(['admin', 'viewer', 'service']);
        return view('callcenter/inicio', compact('title'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicio()
    {
        $title = 'Encuestas De Servicio';
        #Esta es una simple consulta con scope
        $registro = Encuesta::ShowEncuestas()->paginate(50);
        $reprogramadas = Encuesta::ShowReprogramadas();
        return view('callcenter/servicio',compact('registro','reprogramadas','title'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = 'Encuestas De Servicio';
        #Guardamos la encuesta
        Encuesta::saveEncuesta($request);
        $registro = Encuesta::ShowEncuestas()->paginate(50);
        $reprogramadas = Encuesta::ShowReprogramadas();
        
        \Alert::message('Encuesta Guardada Satisfactoriamente', 'info');
        return view('callcenter/servicio', compact('registro', 'reprogramadas','title'));
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
        $title = 'Llamada en curso no. '.$id;
        return view("callcenter.llenado", compact('consulta','encuesta', 'title'));
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
