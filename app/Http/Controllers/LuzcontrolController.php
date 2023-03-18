<?php

namespace App\Http\Controllers;

use App\Models\Luzcontrol;
use App\Http\Requests\StoreLuzcontrolRequest;
use App\Http\Requests\UpdateLuzcontrolRequest;
use Illuminate\Http\Request;
use App\Models\Peritaje;

class LuzcontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreLuzcontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLuzcontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Luzcontrol  $luzcontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Luzcontrol $luzcontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Luzcontrol  $luzcontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Luzcontrol $luzcontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLuzcontrolRequest  $request
     * @param  \App\Models\Luzcontrol  $luzcontrol
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
        $luzcontrol=$peritaje->luzcontrol;
        $luzcontrol->activo=0;
        $luzcontrol->observacion=$request->get('observacion');
        $luzcontrol->nivelaprobado=$request->get('nivelaprobado');
        $luzcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Luzcontrol  $luzcontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Luzcontrol $luzcontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $luzcontrol=$peritaje->luzcontrol;
        $luzcontrol->activo=1;
        $luzcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $luzcontrol=$peritaje->luzcontrol;
        $luzcontrol->activo=0;
        $luzcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
