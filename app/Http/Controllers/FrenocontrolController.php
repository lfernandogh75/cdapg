<?php

namespace App\Http\Controllers;

use App\Models\Frenocontrol;
use App\Http\Requests\StoreFrenocontrolRequest;
use App\Http\Requests\UpdateFrenocontrolRequest;
use Illuminate\Http\Request;
use App\Models\Peritaje;
 

class FrenocontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreFrenocontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFrenocontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frenocontrol  $frenocontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Frenocontrol $frenocontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frenocontrol  $frenocontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Frenocontrol $frenocontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFrenocontrolRequest  $request
     * @param  \App\Models\Frenocontrol  $frenocontrol
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
        $frenocontrol=$peritaje->frenocontrol;
        $frenocontrol->activo=0;
        $frenocontrol->observacion=$request->get('observacion');
        $frenocontrol->nivelaprobado=$request->get('nivelaprobado');
        $frenocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frenocontrol  $frenocontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Frenocontrol $frenocontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $frenocontrol=$peritaje->frenocontrol;
        $frenocontrol->activo=1;
        $frenocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $frenocontrol=$peritaje->frenocontrol;
        $frenocontrol->activo=0;
        $frenocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
