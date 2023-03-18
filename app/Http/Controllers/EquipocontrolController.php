<?php

namespace App\Http\Controllers;

use App\Models\Equipocontrol;
use App\Http\Requests\StoreEquipocontrolRequest;
use App\Http\Requests\UpdateEquipocontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class EquipocontrolController extends Controller
{
    /**
     * Display a listing of the resource.
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
     * @param  \App\Http\Requests\StoreEquipocontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipocontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipocontrol  $equipocontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Equipocontrol $equipocontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipocontrol  $equipocontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipocontrol $equipocontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEquipocontrolRequest  $request
     * @param  \App\Models\Equipocontrol  $equipocontrol
     * @return \Illuminate\Http\Response
     */
  

public function update(Request $request)
    {   $request->validate([
        'peritajeid'=>'required',
        'observacion'=>'required'
        

    ]);
         $id=$request->get('peritajeid');
        $peritaje=Peritaje::find($id);
        $equipocontrol=$peritaje->equipocontrol;
        $equipocontrol->activo=0;
        $equipocontrol->observacion=$request->get('observacion');
       
        $equipocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipocontrol  $equipocontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipocontrol $equipocontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $equipocontrol=$peritaje->equipocontrol;
        $equipocontrol->activo=1;
        $equipocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $equipocontrol=$peritaje->equipocontrol;
        $equipocontrol->activo=0;
        $equipocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
