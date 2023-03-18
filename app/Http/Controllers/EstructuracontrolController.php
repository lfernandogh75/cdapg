<?php

namespace App\Http\Controllers;

use App\Models\Estructuracontrol;
use App\Http\Requests\StoreEstructuracontrolRequest;
use App\Http\Requests\UpdateEstructuracontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class EstructuracontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreEstructuracontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEstructuracontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estructuracontrol  $estructuracontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Estructuracontrol $estructuracontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estructuracontrol  $estructuracontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Estructuracontrol $estructuracontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstructuracontrolRequest  $request
     * @param  \App\Models\Estructuracontrol  $estructuracontrol
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
        $estructuracontrol=$peritaje->estructuracontrol;
        $estructuracontrol->activo=0;
        $estructuracontrol->observacion=$request->get('observacion');
        $estructuracontrol->nivelaprobado=$request->get('nivelaprobado');
        $estructuracontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estructuracontrol  $estructuracontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estructuracontrol $estructuracontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $estructuracontrol=$peritaje->estructuracontrol;
        $estructuracontrol->activo=1;
        $estructuracontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $estructuracontrol=$peritaje->estructuracontrol;
        $estructuracontrol->activo=0;
        $estructuracontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
