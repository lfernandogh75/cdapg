<?php

namespace App\Http\Controllers;

use App\Models\Llantacontrol;
use App\Http\Requests\StoreLlantacontrolRequest;
use App\Http\Requests\UpdateLlantacontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;

class LlantacontrolController extends Controller
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
     * @param  \App\Http\Requests\StoreLlantacontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLlantacontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Llantacontrol  $llantacontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Llantacontrol $llantacontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Llantacontrol  $llantacontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Llantacontrol $llantacontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLlantacontrolRequest  $request
     * @param  \App\Models\Llantacontrol  $llantacontrol
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
            $llantacontrol=$peritaje->llantacontrol;
            $llantacontrol->activo=0;
            $llantacontrol->observacion=$request->get('observacion');
            $llantacontrol->nivelaprobado=$request->get('nivelaprobado');
            $llantacontrol->save(); 
            $vehiculo=$peritaje->vehiculo;
            return view('vehiculo.index')->with(compact('vehiculo'));
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Llantacontrol  $llantacontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Llantacontrol $llantacontrol)
    {
        //
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $llantacontrol=$peritaje->llantacontrol;
        $llantacontrol->activo=1;
        $llantacontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $llantacontrol=$peritaje->llantacontrol;
        $llantacontrol->activo=0;
        $llantacontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
