<?php

namespace App\Http\Controllers;
use App\Models\Fluido;
use App\Models\Fluidocontrol;
use App\Http\Requests\StoreFluidocontrolRequest;
use App\Http\Requests\UpdateFluidocontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class FluidocontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreFluidocontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFluidocontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fluidocontrol  $fluidocontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Fluidocontrol $fluidocontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fluidocontrol  $fluidocontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Fluidocontrol $fluidocontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFluidocontrolRequest  $request
     * @param  \App\Models\Fluidocontrol  $fluidocontrol
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
        $fluidocontrol=$peritaje->fluidocontrol;
        $fluidocontrol->activo=0;
        $fluidocontrol->observacion=$request->get('observacion');
        $fluidocontrol->nivelaprobado=$request->get('nivelaprobado');
        $fluidocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fluidocontrol  $fluidocontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fluidocontrol $fluidocontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $fluidocontrol=$peritaje->fluidocontrol;
        $fluidocontrol->activo=1;
        $fluidocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $fluidocontrol=$peritaje->fluidocontrol;
        $fluidocontrol->activo=0;
        $fluidocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
