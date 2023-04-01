<?php

namespace App\Http\Controllers;

use App\Models\Cierre;
use App\Models\Peritaje;
use App\Models\Vehiculo;
use App\Models\Empresa;
use App\Http\Requests\StoreCierreRequest;
use App\Http\Requests\UpdateCierreRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CierreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         
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
     * @param  \App\Http\Requests\StoreCierreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $user=Auth::user();
       
        $peritaje_id=$request->get('peritaje_id');
        $peritaje =Peritaje::find( $peritaje_id);

        $cierre= new Cierre();
        $cierre->user_id=$user->id;
       $cierre->empresa_id=$request->get('empresa_id');
       $cierre->blindado=$request->get('blindado');
       $cierre->polarizado=$request->get('polarizado');
       $cierre->tipocaja=$request->get('tipocaja');
       $cierre->tipomotor=$request->get('tipomotor');
       $cierre->codigofasecolda=$request->get('codigofasecolda');
       $cierre->valorfasecolda=$request->get('valorfasecolda');
       $cierre->valorcarvalue=$request->get('valorcarvalue');
       $cierre->resultado=$request->get('resultado');
       $cierre->gnvc=$request->get('gnvc');
       $cierre->tipopintura=$request->get('tipopintura');
       $cierre->serviciosolicitado=$request->get('serviciosolicitado');
       $cierre->valoraccesorios=$request->get('valoraccesorios');
       $cierre->observacion=$request->get('observacion');
       
       $cierre->peritaje_id=$peritaje->id;
       $cierre->activo=0;
       $cierre->save();
       $placa=$cierre->peritaje->vehiculo->placa;
       return redirect( "/vehiculos?placa=$placa&vehiculoindex=1");
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cierre  $cierre
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $cierre=Cierre::find($id);
      return view('vehiculo.cierre.index')->with(compact('cierre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cierre  $cierre
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $cierre=Cierre::find($id);
        $empresas=Empresa::all();
         
       // $vehiculo=Vehiculo::find($cierre->peritaje_id);
       // return view('vehiculo.moto')->with('marcas', $marcas);
       return view('vehiculo.cierre.edit')->with(compact('cierre','empresas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCierreRequest  $request
     * @param  \App\Models\Cierre  $cierre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $cierre=Cierre::find($id);

        $cierre->blindado=$request->get('blindado');
        $cierre->empresa_id=$request->get('empresa_id');
        $cierre->polarizado=$request->get('polarizado');
        $cierre->tipocaja=$request->get('tipocaja');
        $cierre->tipomotor=$request->get('tipomotor');
        $cierre->codigofasecolda=$request->get('codigofasecolda');
        $cierre->valorfasecolda=$request->get('valorfasecolda');
        $cierre->valorcarvalue=$request->get('valorcarvalue');
        $cierre->resultado=$request->get('resultado');
        $cierre->gnvc=$request->get('gnvc');
        $cierre->tipopintura=$request->get('tipopintura');
        $cierre->serviciosolicitado=$request->get('serviciosolicitado');
        $cierre->valoraccesorios=$request->get('valoraccesorios');
        $cierre->observacion=$request->get('observacion');
        
        
       $cierre->activo=0;
       $cierre->save();
       $placa=$cierre->peritaje->vehiculo->placa;
       return redirect( "/vehiculos?placa=$placa&vehiculoindex=1");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cierre  $cierre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cierre $cierre)
    {
        //
    }
    public function ccierre(Request $request)
    {
        $empresas=Empresa::all();
        $placa=$request->get('placa');
        if($placa=="")
                 return view('vehiculo.index');
        else{
            $vehiculo=Vehiculo::where('placa','=',$placa)->latest()->first();
        

       
       // return view('vehiculo.moto')->with('marcas', $marcas);
       return view('vehiculo.cierre.create')->with(compact('vehiculo','empresas'));
       }
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $cierre=$peritaje->cierre;
        $cierre->activo=1;
        $cierre->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $cierre=$peritaje->cierre;
        $cierre->activo=0;
        $cierre->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
