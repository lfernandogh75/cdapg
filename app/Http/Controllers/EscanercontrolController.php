<?php

namespace App\Http\Controllers;

use App\Models\Escanercontrol;
use App\Http\Requests\StoreEscanercontrolRequest;
use App\Http\Requests\UpdateEscanercontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class EscanercontrolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreEscanercontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEscanercontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Escanercontrol  $escanercontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Escanercontrol $escanercontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Escanercontrol  $escanercontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Escanercontrol $escanercontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEscanercontrolRequest  $request
     * @param  \App\Models\Escanercontrol  $escanercontrol
     * @return \Illuminate\Http\Response
     */
  

public function update(Request $request)
    {   $request->validate([
        'peritajeid'=>'required',
        'observacion'=>'required'
        

    ]);
         $id=$request->get('peritajeid');
        $peritaje=Peritaje::find($id);
        $escanercontrol=$peritaje->escanercontrol;
        $escanercontrol->activo=0;
        $escanercontrol->observacion=$request->get('observacion');
      //  $escanercontrol->nivelaprobado=$request->get('nivelaprobado');
        $escanercontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escanercontrol  $escanercontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Escanercontrol $escanercontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $escanercontrol=$peritaje->escanercontrol;
        $escanercontrol->activo=1;
        $escanercontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $escanercontrol=$peritaje->escanercontrol;
        $escanercontrol->activo=0;
        $escanercontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
