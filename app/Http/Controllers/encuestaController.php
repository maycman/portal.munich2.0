<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Log;
use App\Registro;

class encuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('callcenter/inicio');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function servicio()
    {
        $registro = Registro::all();
        return view('callcenter/servicio', compact('registro'));
    }
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
        dd($request);
        /*Registro::create([
            'concesionaria' => $base->no_concesionario,
            'empresa' =>$base->empresa,
            'razon_social' =>$base->razonsocial,
            'nombre' =>$base->nombre,
            'ap_paterno' =>$base->apellido,
        ]);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        #Log::debug('------------------------------------------------------------------------------------------------------');
        #Log::debug($id);
        $consulta = Registro::where('id_registro',$id)->first();
        #Log::debug('>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>');
        #Log::debug($consulta);
        return view("callcenter.llenado", compact('consulta'));
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
