<?php

namespace App\Http\Controllers;

use App\Models\Motorcontrol;
use App\Http\Requests\StoreMotorcontrolRequest;
use App\Http\Requests\UpdateMotorcontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class MotorcontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreMotorcontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMotorcontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motorcontrol  $motorcontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Motorcontrol $motorcontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Motorcontrol  $motorcontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Motorcontrol $motorcontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMotorcontrolRequest  $request
     * @param  \App\Models\Motorcontrol  $motorcontrol
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
        $motorcontrol=$peritaje->motorcontrol;
        $motorcontrol->activo=0;
        $motorcontrol->observacion=$request->get('observacion');
        $motorcontrol->nivelaprobado=$request->get('nivelaprobado');
        $motorcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Motorcontrol  $motorcontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Motorcontrol $motorcontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $motorcontrol=$peritaje->motorcontrol;
        $motorcontrol->activo=1;
        $motorcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $motorcontrol=$peritaje->motorcontrol;
        $motorcontrol->activo=0;
        $motorcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
