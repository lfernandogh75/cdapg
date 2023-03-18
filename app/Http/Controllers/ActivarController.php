<?php

namespace App\Http\Controllers;

use App\Models\Activar;
use App\Http\Requests\StoreActivarRequest;
use App\Http\Requests\UpdateActivarRequest;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Peritaje;

class ActivarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   //funcion contructor
public function __construct(){
    $this->middleware('superadmin');
}
   
     public function index(Request $request)
    {
        $placa=$request->get('placa');
        $vehiculoindex=$request->get('vehiculoindex');
        if($placa=="")
                 return view('superadmin.activar.index');
        if($placa!="" && $vehiculoindex=="1"){
            $vehiculo=Vehiculo::where('placa','=',$placa)->latest()->first();
     
       if (isset( $vehiculo)) {
        return view('superadmin.activar.index')->with(compact('vehiculo'));
       }else{
        $mensaje="Placa no Encontrada";
        return view('superadmin.activar.index')->with(compact('mensaje'));
       }
        }
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
     * @param  \App\Http\Requests\StoreActivarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreActivarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activar  $activar
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $placa=$request->get('placa');
        $vehiculoindex=$request->get('vehiculoindex');
        if($placa=="")
                 return view('superadmin.activar.index');
        if($placa!="" && $vehiculoindex=="1"){
            $vehiculo=Vehiculo::where('placa','=',$placa)->latest()->first();
     
       if (isset( $vehiculo)) {
        return view('superadmin.activar.index')->with(compact('vehiculo'));
       }else{
        $mensaje="Placa no Encontrada";
        return view('superadmin.activar.index')->with(compact('mensaje'));
       }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activar  $activar
     * @return \Illuminate\Http\Response
     */
    public function edit(Activar $activar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateActivarRequest  $request
     * @param  \App\Models\Activar  $activar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateActivarRequest $request, Activar $activar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activar  $activar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activar $activar)
    {
        //
    }
}
