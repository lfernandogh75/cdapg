<?php

namespace App\Http\Controllers;

use App\Models\Nfluidocontrol;
use App\Http\Requests\StoreNfluidocontrolRequest;
use App\Http\Requests\UpdateNfluidocontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class NfluidocontrolController extends Controller
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
     * @param  \App\Http\Requests\StorenfluidocontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorenfluidocontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nfluidocontrol  $nfluidocontrol
     * @return \Illuminate\Http\Response
     */
    public function show(nfluidocontrol $nfluidocontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\nfluidocontrol  $nfluidocontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(nfluidocontrol $nfluidocontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatenfluidocontrolRequest  $request
     * @param  \App\Models\nfluidocontrol  $nfluidocontrol
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
        $nfluidocontrol=$peritaje->nfluidocontrol;
        $nfluidocontrol->activo=0;
        $nfluidocontrol->observacion=$request->get('observacion');
        $nfluidocontrol->nivelaprobado=$request->get('nivelaprobado');
        $nfluidocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nfluidocontrol  $nfluidocontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(nfluidocontrol $nfluidocontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $nfluidocontrol=$peritaje->nfluidocontrol;
        $nfluidocontrol->activo=1;
        $nfluidocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $nfluidocontrol=$peritaje->nfluidocontrol;
        $nfluidocontrol->activo=0;
        $nfluidocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
