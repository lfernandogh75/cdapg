<?php

namespace App\Http\Controllers;

use App\Models\Escaner;
use App\Http\Requests\StoreEscanerRequest;
use App\Http\Requests\UpdateEscanerRequest;
use App\Models\Escanercontrol;
use App\Models\Peritaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscanerController extends Controller
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
    public function create(Request $request)
    {
        $peritaje_id=$request->get('id');
        $peritaje=Peritaje::find($peritaje_id);
        
        return view('vehiculo/escaner.create',compact('peritaje'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreescanerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $escaner = new Escaner();
       if(isset($peritaje->escanercontrol)){
      
        
        $escaner->codigo = $request->get('codigo');
        $escaner->elemento = $request->get('elemento');
        $escaner->escanercontrol_id =  $peritaje->escanercontrol->id;
        $escaner->observaciones = $request->get('observaciones');
        $escaner->perito =  $user->name;
        $escaner->save(); 

       }else{
        
        $escanercontrol = new Escanercontrol();
        $escanercontrol->peritaje_id=$request->get('peritaje_id');
        $escanercontrol->user_id=$user->id;
        $escanercontrol->observacion="N/A";
        
        $escanercontrol->save(); 
        
        $escaner->codigo = $request->get('codigo');
        $escaner->elemento = $request->get('elemento');
        $escaner->escanercontrol_id =  $escanercontrol->id;
        $escaner->observaciones = $request->get('observaciones');
        $escaner->perito =  $user->name;
        $escaner->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $escaners=$peritaje->escanercontrol->escanerparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->escanercontrol->user;
        $escanercontrol=$peritaje->escanercontrol;
        // return view('vehiculo.sistemaescaner')->with('vehiculo', $vehiculo);
        return view('vehiculo.escaner')->with(compact('vehiculo','escaners','responsable','escanercontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Escaner  $escaner
     * @return \Illuminate\Http\Response
     */
    public function show(Escaner $escaner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Escaner  $escaner
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $escaner = Escaner::find($id);
        return view('vehiculo/escaner.edit')->with('escaner',$escaner);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateescanerRequest  $request
     * @param  \App\Models\Escaner  $escaner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        $escaners =  Escaner::find($id);
        $escaners->codigo = $request->get('codigo');
        $escaners->elemento = $request->get('elemento');
        $escaners->observaciones = $request->get('observaciones');
        $escaners->perito =  $user->name;
        $escaners->save();    
        $idperitaje=$escaners->escanercontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$escaners=$peritaje->piezasescaner;
        $escaners=$peritaje->escanercontrol->escanerparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->escanercontrol->user;
        $escanercontrol=$peritaje->escanercontrol;
        // return view('vehiculo.sistemaescaner')->with('vehiculo', $vehiculo);
        return view('vehiculo.escaner')->with(compact('vehiculo','escaners','responsable','escanercontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Escaner  $escaner
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $escaner = Escaner::find($id);        
        $idperitaje=$escaner->escanercontrol->peritaje->id;
        $escaner->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $escaners=$peritaje->escanercontrol->escanerparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->escanercontrol->user;
        $escanercontrol=$peritaje->escanercontrol;
        // return view('vehiculo.sistemaescaner')->with('vehiculo', $vehiculo);escanercontrol
        return view('vehiculo.escaner')->with(compact('vehiculo','escaners','responsable','escanercontrol'));
    }
}
