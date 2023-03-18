<?php

namespace App\Http\Controllers;

use App\Models\vlucescontrol;
use App\Http\Requests\StorevlucescontrolRequest;
use App\Http\Requests\UpdatevlucescontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class VlucescontrolController extends Controller
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
     * @param  \App\Http\Requests\StorevlucescontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorevlucescontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vlucescontrol  $vlucescontrol
     * @return \Illuminate\Http\Response
     */
    public function show(vlucescontrol $vlucescontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vlucescontrol  $vlucescontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(vlucescontrol $vlucescontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevlucescontrolRequest  $request
     * @param  \App\Models\vlucescontrol  $vlucescontrol
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
        $vlucescontrol=$peritaje->vlucescontrol;
        $vlucescontrol->activo=0;
        $vlucescontrol->observacion=$request->get('observacion');
        $vlucescontrol->nivelaprobado=$request->get('nivelaprobado');
        $vlucescontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vlucescontrol  $vlucescontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(vlucescontrol $vlucescontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $vlucescontrol=$peritaje->vlucescontrol;
        $vlucescontrol->activo=1;
        $vlucescontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $vlucescontrol=$peritaje->vlucescontrol;
        $vlucescontrol->activo=0;
        $vlucescontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
