<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use Log;
use App\Registro;
use App\SEncuesta;

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
        $registro = Registro::orderBy('id_registro', 'DESC')->paginate(50);
        //$registro = Registro::where();
        return view('callcenter/servicio', compact('registro'));
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
        //dd($request);
        //isset($request->acepta)?:$request->acepta=null;
        //dd($request->acepta);
        SEncuesta::create([
            'id_registro' =>$request->id_registro,
            'acepta' => $request->acepta,
            'reprograma' =>$request->butonReprograma,
            'fecha_reprograma' =>$request->reprograma,
            'p1' =>$request->p1,
            'p2' =>$request->p2,
            'p2a' =>$request->p2a,
            'p2b' =>$request->p2b,
            'p2c' =>$request->p2c,
            'p2d' =>$request->p2d,
            'p2e' =>$request->p2e,
            'p2f' =>$request->p2f,
            'p3' =>$request->p3,
            'disp_refacciones' =>$request->ra,
            'problema_no_determinado' =>$request->rb,
            'falla_de_nuevo' =>$request->rc,
            'trabajo_parcial' =>$request->rd,
            'taller_causo_problema' =>$request->re,
            'taller_nego_problema' =>$request->rf,
            'taller_ocupado' =>$request->rg,
            'otro' =>$request->hrComent,
            'p4' =>$request->p4,
            'p4a' =>$request->p4a,
            'p4b' =>$request->p4b,
            'p4c' =>$request->p4c,
            'p4d' =>$request->p4d,
            'p5' =>$request->p5,
            'p5a' =>$request->p5a,
            'p5b' =>$request->p5b,
            'p5c' =>$request->p5c,
            'p5d' =>$request->p5d,
            'p6' =>$request->p6,
            'p6a' =>$request->p6a,
            'p7' =>$request->p7,
            'p5' =>$request->p5,
            'comentarios' =>$request->comentarios
        ]);
        $registro = Registro::orderBy('id_registro', 'DESC')->paginate(50);
        \Alert::message('Encuesta guardada', 'success');
        return view('callcenter.servicio', compact('registro'));
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
