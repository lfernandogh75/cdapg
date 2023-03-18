<?php

namespace App\Http\Controllers;

use App\Models\Pinturacontrol;
use App\Http\Requests\StorePinturacontrolRequest;
use App\Http\Requests\UpdatePinturacontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class PinturacontrolController extends Controller
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
     * @param  \App\Http\Requests\StorepinturacontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorepinturacontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pinturacontrol  $pinturacontrol
     * @return \Illuminate\Http\Response
     */
    public function show(pinturacontrol $pinturacontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pinturacontrol  $pinturacontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(pinturacontrol $pinturacontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepinturacontrolRequest  $request
     * @param  \App\Models\pinturacontrol  $pinturacontrol
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
        $pinturacontrol=$peritaje->pinturacontrol;
        $pinturacontrol->activo=0;
        $pinturacontrol->observacion=$request->get('observacion');
        $pinturacontrol->nivelaprobado=$request->get('nivelaprobado');
        $pinturacontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pinturacontrol  $pinturacontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(pinturacontrol $pinturacontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $pinturacontrol=$peritaje->pinturacontrol;
        $pinturacontrol->activo=1;
        $pinturacontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $pinturacontrol=$peritaje->pinturacontrol;
        $pinturacontrol->activo=0;
        $pinturacontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
