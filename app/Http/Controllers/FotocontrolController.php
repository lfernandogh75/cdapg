<?php

namespace App\Http\Controllers;

use App\Models\Fotocontrol;
use App\Http\Requests\StoreFotocontrolRequest;
use App\Http\Requests\UpdateFotocontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class FotocontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreFotocontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFotocontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fotocontrol  $fotocontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Fotocontrol $fotocontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fotocontrol  $fotocontrol
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFotocontrolRequest  $request
     * @param  \App\Models\Fotocontrol  $fotocontrol
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {   $request->validate([
        'peritajeid'=>'required'
       // 'observacion'=>'required',
       // 'nivelaprobado'=>'required'

    ]);
         $id=$request->get('peritajeid');
        $peritaje=Peritaje::find($id);
        $fotocontrol=$peritaje->fotocontrol;
        $fotocontrol->activo=0;
       // $fotocontrol->observacion=$request->get('observacion');
       $fotocontrol->observacion="N/A"; 
       $fotocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fotocontrol  $fotocontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fotocontrol $fotocontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $fotocontrol=$peritaje->fotocontrol;
        $fotocontrol->activo=1;
        $fotocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $fotocontrol=$peritaje->fotocontrol;
        $fotocontrol->activo=0;
        $fotocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
