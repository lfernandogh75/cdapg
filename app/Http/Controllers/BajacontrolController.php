<?php

namespace App\Http\Controllers;

use App\Models\Bajacontrol;
use App\Http\Requests\StoreBajacontrolRequest;
use App\Http\Requests\UpdateBajacontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;


class BajacontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreBajacontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBajacontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bajacontrol  $bajacontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Bajacontrol $bajacontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bajacontrol  $bajacontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Bajacontrol $bajacontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBajacontrolRequest  $request
     * @param  \App\Models\Bajacontrol  $bajacontrol
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
        $bajacontrol=$peritaje->bajacontrol;
        $bajacontrol->activo=0;
        $bajacontrol->observacion=$request->get('observacion');
        $bajacontrol->nivelaprobado=$request->get('nivelaprobado');
        $bajacontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bajacontrol  $bajacontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bajacontrol $bajacontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $bajacontrol=$peritaje->bajacontrol;
        $bajacontrol->activo=1;
        $bajacontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $bajacontrol=$peritaje->bajacontrol;
        $bajacontrol->activo=0;
        $bajacontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
