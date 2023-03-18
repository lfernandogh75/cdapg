<?php

namespace App\Http\Controllers;

use App\Models\Suspensioncontrol;
use App\Http\Requests\StoreSuspensioncontrolRequest;
use App\Http\Requests\UpdateSuspensioncontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;
class SuspensioncontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreSuspensioncontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuspensioncontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suspensioncontrol  $suspensioncontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Suspensioncontrol $suspensioncontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suspensioncontrol  $suspensioncontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Suspensioncontrol $suspensioncontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuspensioncontrolRequest  $request
     * @param  \App\Models\Suspensioncontrol  $suspensioncontrol
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
        $suspensioncontrol=$peritaje->suspensioncontrol;
        $suspensioncontrol->activo=0;
        $suspensioncontrol->observacion=$request->get('observacion');
        $suspensioncontrol->nivelaprobado=$request->get('nivelaprobado');
        $suspensioncontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suspensioncontrol  $suspensioncontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suspensioncontrol $suspensioncontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $suspensioncontrol=$peritaje->suspensioncontrol;
        $suspensioncontrol->activo=1;
        $suspensioncontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $suspensioncontrol=$peritaje->suspensioncontrol;
        $suspensioncontrol->activo=0;
        $suspensioncontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
