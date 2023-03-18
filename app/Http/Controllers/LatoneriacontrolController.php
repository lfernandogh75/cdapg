<?php

namespace App\Http\Controllers;

use App\Models\Latoneriacontrol;
use App\Http\Requests\StoreLatoneriacontrolRequest;
use App\Http\Requests\UpdateLatoneriacontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class LatoneriacontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreLatoneriacontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLatoneriacontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Latoneriacontrol  $latoneriacontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Latoneriacontrol $latoneriacontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Latoneriacontrol  $latoneriacontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Latoneriacontrol $latoneriacontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLatoneriacontrolRequest  $request
     * @param  \App\Models\Latoneriacontrol  $latoneriacontrol
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
        $latoneriacontrol=$peritaje->latoneriacontrol;
        $latoneriacontrol->activo=0;
        $latoneriacontrol->observacion=$request->get('observacion');
        $latoneriacontrol->nivelaprobado=$request->get('nivelaprobado');
        $latoneriacontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Latoneriacontrol  $latoneriacontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Latoneriacontrol $latoneriacontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $latoneriacontrol=$peritaje->latoneriacontrol;
        $latoneriacontrol->activo=1;
        $latoneriacontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $latoneriacontrol=$peritaje->latoneriacontrol;
        $latoneriacontrol->activo=0;
        $latoneriacontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
