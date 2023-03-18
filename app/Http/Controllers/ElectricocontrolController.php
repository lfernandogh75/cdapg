<?php

namespace App\Http\Controllers;

use App\Models\Electricocontrol;
use App\Http\Requests\StoreElectricocontrolRequest;
use App\Http\Requests\UpdateElectricocontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class ElectricocontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreElectricocontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreElectricocontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Electricocontrol  $electricocontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Electricocontrol $electricocontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Electricocontrol  $electricocontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Electricocontrol $electricocontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateElectricocontrolRequest  $request
     * @param  \App\Models\Electricocontrol  $electricocontrol
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
            $electricocontrol=$peritaje->electricocontrol;
            $electricocontrol->activo=0;
            $electricocontrol->observacion=$request->get('observacion');
            $electricocontrol->nivelaprobado=$request->get('nivelaprobado');
            $electricocontrol->save(); 
            $vehiculo=$peritaje->vehiculo;
            return view('vehiculo.index')->with(compact('vehiculo'));
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Electricocontrol  $electricocontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Electricocontrol $electricocontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $electricocontrol=$peritaje->electricocontrol;
        $electricocontrol->activo=1;
        $electricocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $electricocontrol=$peritaje->electricocontrol;
        $electricocontrol->activo=0;
        $electricocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
