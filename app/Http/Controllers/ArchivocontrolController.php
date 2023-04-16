<?php

namespace App\Http\Controllers;

use App\Models\Archivocontrol;
use App\Http\Requests\StoreArchivocontrolRequest;
use App\Http\Requests\UpdateArchivocontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class ArchivocontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreArchivocontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArchivocontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivocontrol  $archivocontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Archivocontrol $archivocontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivocontrol  $archivocontrol
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArchivocontrolRequest  $request
     * @param  \App\Models\Archivocontrol  $archivocontrol
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
        $archivocontrol=$peritaje->archivocontrol;
        $archivocontrol->activo=0;
       // $archivocontrol->observacion=$request->get('observacion');
       $archivocontrol->observacion="N/A"; 
       $archivocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivocontrol  $archivocontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivocontrol $archivocontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $archivocontrol=$peritaje->archivocontrol;
        $archivocontrol->activo=1;
        $archivocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $archivocontrol=$peritaje->archivocontrol;
        $archivocontrol->activo=0;
        $archivocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
