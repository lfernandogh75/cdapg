<?php

namespace App\Http\Controllers;

use App\Models\Exteriorcontrol;
use App\Http\Requests\StoreExteriorcontrolRequest;
use App\Http\Requests\UpdateExteriorcontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class ExteriorcontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreExteriorcontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreExteriorcontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exteriorcontrol  $exteriorcontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Exteriorcontrol $exteriorcontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exteriorcontrol  $exteriorcontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Exteriorcontrol $exteriorcontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExteriorcontrolRequest  $request
     * @param  \App\Models\Exteriorcontrol  $exteriorcontrol
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
        $exteriorcontrol=$peritaje->exteriorcontrol;
        $exteriorcontrol->activo=0;
        $exteriorcontrol->observacion=$request->get('observacion');
        $exteriorcontrol->nivelaprobado=$request->get('nivelaprobado');
        $exteriorcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exteriorcontrol  $exteriorcontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exteriorcontrol $exteriorcontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $exteriorcontrol=$peritaje->exteriorcontrol;
        $exteriorcontrol->activo=1;
        $exteriorcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $exteriorcontrol=$peritaje->exteriorcontrol;
        $exteriorcontrol->activo=0;
        $exteriorcontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
