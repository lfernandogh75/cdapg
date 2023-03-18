<?php

namespace App\Http\Controllers;

use App\Models\Vidriocontrol;
use App\Http\Requests\StoreVidriocontrolRequest;
use App\Http\Requests\UpdateVidriocontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class VidriocontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreVidriocontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVidriocontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vidriocontrol  $vidriocontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Vidriocontrol $vidriocontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vidriocontrol  $vidriocontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Vidriocontrol $vidriocontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVidriocontrolRequest  $request
     * @param  \App\Models\Vidriocontrol  $vidriocontrol
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
        $vidriocontrol=$peritaje->vidriocontrol;
        $vidriocontrol->activo=0;
        $vidriocontrol->observacion=$request->get('observacion');
        $vidriocontrol->nivelaprobado=$request->get('nivelaprobado');
        $vidriocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vidriocontrol  $vidriocontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vidriocontrol $vidriocontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $vidriocontrol=$peritaje->vidriocontrol;
        $vidriocontrol->activo=1;
        $vidriocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $vidriocontrol=$peritaje->vidriocontrol;
        $vidriocontrol->activo=0;
        $vidriocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
