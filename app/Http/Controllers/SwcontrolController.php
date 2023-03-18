<?php

namespace App\Http\Controllers;

use App\Models\Swcontrol;
use App\Http\Requests\StoreSwcontrolRequest;
use App\Http\Requests\UpdateSwcontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class SwcontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreSwcontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSwcontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Swcontrol  $swcontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Swcontrol $swcontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Swcontrol  $swcontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Swcontrol $swcontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSwcontrolRequest  $request
     * @param  \App\Models\Swcontrol  $swcontrol
     * @return \Illuminate\Http\Response
     */
  

public function update(Request $request)
    {   $request->validate([
        'peritajeid'=>'required',
        'observacion'=>'required'
        

    ]);
         $id=$request->get('peritajeid');
        $peritaje=Peritaje::find($id);
        $swcontrol=$peritaje->swcontrol;
        $swcontrol->activo=0;
        $swcontrol->observacion=$request->get('observacion');
       
        $swcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Swcontrol  $swcontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Swcontrol $swcontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $swcontrol=$peritaje->swcontrol;
        $swcontrol->activo=1;
        $swcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $swcontrol=$peritaje->swcontrol;
        $swcontrol->activo=0;
        $swcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
