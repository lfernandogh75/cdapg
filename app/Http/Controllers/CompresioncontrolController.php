<?php

namespace App\Http\Controllers;

use App\Models\Compresioncontrol;
use App\Http\Requests\StoreCompresioncontrolRequest;
use App\Http\Requests\UpdateCompresioncontrolRequest;
use Illuminate\Http\Request;
use App\Models\Peritaje;

class CompresioncontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreCompresioncontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompresioncontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compresioncontrol  $compresioncontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Compresioncontrol $compresioncontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compresioncontrol  $compresioncontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Compresioncontrol $compresioncontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompresioncontrolRequest  $request
     * @param  \App\Models\Compresioncontrol  $compresioncontrol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   $request->validate([
        'peritajeid'=>'required',
        'observacion'=>'required',
        'nivelaprobado'=>'required'

    ]);
         $id=$request->get('peritajeid');
        $peritaje=Peritaje::find($id);
        $compresioncontrol=$peritaje->compresioncontrol;
        $compresioncontrol->activo=0;
        $compresioncontrol->observacion=$request->get('observacion');
        $compresioncontrol->nivelaprobado=$request->get('nivelaprobado');
        $compresioncontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compresioncontrol  $compresioncontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compresioncontrol $compresioncontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $compresioncontrol=$peritaje->compresioncontrol;
        $compresioncontrol->activo=1;
        $compresioncontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $compresioncontrol=$peritaje->compresioncontrol;
        $compresioncontrol->activo=0;
        $compresioncontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
