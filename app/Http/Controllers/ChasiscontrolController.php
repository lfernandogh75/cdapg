<?php

namespace App\Http\Controllers;

use App\Models\Chasiscontrol;
use App\Http\Requests\StoreChasiscontrolRequest;
use App\Http\Requests\UpdateChasiscontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class ChasiscontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreChasiscontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreChasiscontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chasiscontrol  $chasiscontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Chasiscontrol $chasiscontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chasiscontrol  $chasiscontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Chasiscontrol $chasiscontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChasiscontrolRequest  $request
     * @param  \App\Models\Chasiscontrol  $chasiscontrol
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
        $chasiscontrol=$peritaje->chasiscontrol;
        $chasiscontrol->activo=0;
        $chasiscontrol->observacion=$request->get('observacion');
        $chasiscontrol->nivelaprobado=$request->get('nivelaprobado');
        $chasiscontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chasiscontrol  $chasiscontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chasiscontrol $chasiscontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $chasiscontrol=$peritaje->chasiscontrol;
        $chasiscontrol->activo=1;
        $chasiscontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $chasiscontrol=$peritaje->chasiscontrol;
        $chasiscontrol->activo=0;
        $chasiscontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
