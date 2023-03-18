<?php

namespace App\Http\Controllers;

use App\Models\Interiorcontrol;
use App\Http\Requests\StoreInteriorcontrolRequest;
use App\Http\Requests\UpdateInteriorcontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class InteriorcontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreInteriorcontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreInteriorcontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interiorcontrol  $interiorcontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Interiorcontrol $interiorcontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interiorcontrol  $interiorcontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Interiorcontrol $interiorcontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateInteriorcontrolRequest  $request
     * @param  \App\Models\Interiorcontrol  $interiorcontrol
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
        $interiorcontrol=$peritaje->interiorcontrol;
        $interiorcontrol->activo=0;
        $interiorcontrol->observacion=$request->get('observacion');
        $interiorcontrol->nivelaprobado=$request->get('nivelaprobado');
        $interiorcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interiorcontrol  $interiorcontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Interiorcontrol $interiorcontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $interiorcontrol=$peritaje->interiorcontrol;
        $interiorcontrol->activo=1;
        $interiorcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $interiorcontrol=$peritaje->interiorcontrol;
        $interiorcontrol->activo=0;
        $interiorcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
