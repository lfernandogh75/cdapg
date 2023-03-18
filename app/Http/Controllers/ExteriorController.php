<?php

namespace App\Http\Controllers;

use App\Models\Exterior;
use App\Http\Requests\StoreExteriorRequest;
use App\Http\Requests\UpdateExteriorRequest;
use App\Models\Peritaje;
use App\Models\Exteriorpart;
use App\Models\Exteriorcontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ExteriorController extends Controller
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
        $exteriorparts =Exteriorpart::all();
        return view('vehiculo/exteriores.create',compact('peritaje','exteriorparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExteriorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $exterior = new Exterior();
       if(isset($peritaje->exteriorcontrol)){
      
        $exterior->exteriorpart_id = $request->get('pieza');
        $exterior->estado = $request->get('estado');
        $exterior->tipo = $request->get('tipo');
        $exterior->exteriorcontrol_id =  $peritaje->exteriorcontrol->id;
        $exterior->observaciones = $request->get('observaciones');
        $exterior->save(); 

       }else{
        $user=Auth::user();
        $exteriorcontrol = new Exteriorcontrol();
        $exteriorcontrol->peritaje_id=$request->get('peritaje_id');
        $exteriorcontrol->user_id=$user->id;
        $exteriorcontrol->observacion="N/A";
        $exteriorcontrol->nivelaprobado=0;
        $exteriorcontrol->save(); 
        $exterior->exteriorpart_id = $request->get('pieza');
        $exterior->estado = $request->get('estado');
        $exterior->tipo = $request->get('tipo');
        $exterior->exteriorcontrol_id =  $exteriorcontrol->id;
        $exterior->observaciones = $request->get('observaciones');
        $exterior->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $exteriores=$peritaje->exteriorcontrol->piezasexteriores;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->exteriorcontrol->user;
        $exteriorcontrol=$peritaje->exteriorcontrol;
        // return view('vehiculo.sistemaexterior')->with('vehiculo', $vehiculo);
        return view('vehiculo.exterior')->with(compact('vehiculo','exteriores','responsable','exteriorcontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exterior  $exterior
     * @return \Illuminate\Http\Response
     */
    public function show(Exterior $exterior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exterior  $exterior
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $exterior = Exterior::find($id);
        return view('vehiculo/exteriores.edit')->with('exterior',$exterior);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExteriorRequest  $request
     * @param  \App\Models\Exterior  $exterior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $exteriors =  Exterior::find($id);
        $exteriors->estado = $request->get('estado');
        $exteriors->tipo = $request->get('tipo');
        $exteriors->observaciones = $request->get('observaciones');
        $exteriors->save();    
        $idperitaje=$exteriors->exteriorcontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$exteriors=$peritaje->piezasexterior;
        $exteriores=$peritaje->exteriorcontrol->piezasexteriores;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->exteriorcontrol->user;
        $exteriorcontrol=$peritaje->exteriorcontrol;
        // return view('vehiculo.sistemaexterior')->with('vehiculo', $vehiculo);
        return view('vehiculo.exterior')->with(compact('vehiculo','exteriores','responsable','exteriorcontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exterior  $exterior
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exterior = Exterior::find($id);        
        $idperitaje=$exterior->exteriorcontrol->peritaje->id;
        $exterior->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $exteriores=$peritaje->exteriorcontrol->piezasexteriores;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->exteriorcontrol->user;
        $exteriorcontrol=$peritaje->exteriorcontrol;
        // return view('vehiculo.sistemaexterior')->with('vehiculo', $vehiculo);
        return view('vehiculo.exterior')->with(compact('vehiculo','exteriores','responsable','exteriorcontrol'));
    }
}
