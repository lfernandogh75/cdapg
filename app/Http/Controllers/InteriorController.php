<?php

namespace App\Http\Controllers;

use App\Models\Interior;
use App\Http\Requests\StoreInteriorRequest;
use App\Http\Requests\UpdateInteriorRequest;
use App\Models\Peritaje;
use App\Models\Interiorpart;
use App\Models\Interiorcontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InteriorController extends Controller
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
        $interiorparts =Interiorpart::all();
        return view('vehiculo/interior.create',compact('peritaje','interiorparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreinteriorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $interior = new Interior();
       if(isset($peritaje->interiorcontrol)){
      
        $interior->interiorpart_id = $request->get('pieza');
        $interior->estado = $request->get('estado');
        $interior->interiorcontrol_id =  $peritaje->interiorcontrol->id;
        $interior->observaciones = $request->get('observaciones');
        $interior->save(); 

       }else{
        $user=Auth::user();
        $interiorcontrol = new Interiorcontrol();
        $interiorcontrol->peritaje_id=$request->get('peritaje_id');
        $interiorcontrol->user_id=$user->id;
        $interiorcontrol->observacion="N/A";
        $interiorcontrol->nivelaprobado=0;
        $interiorcontrol->save(); 
        $interior->interiorpart_id = $request->get('pieza');
        $interior->estado = $request->get('estado');
        $interior->interiorcontrol_id =  $interiorcontrol->id;
        $interior->observaciones = $request->get('observaciones');
        $interior->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $interiors=$peritaje->interiorcontrol->interiorparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->interiorcontrol->user;
        $interiorcontrol=$peritaje->interiorcontrol;
        // return view('vehiculo.sistemainterior')->with('vehiculo', $vehiculo);
        return view('vehiculo.interior')->with(compact('vehiculo','interiors','responsable','interiorcontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interior  $interior
     * @return \Illuminate\Http\Response
     */
    public function show(Interior $interior)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interior  $interior
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $interior = Interior::find($id);
        return view('vehiculo/interior.edit')->with('interior',$interior);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateinteriorRequest  $request
     * @param  \App\Models\Interior  $interior
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $interiors =  Interior::find($id);
        $interiors->estado = $request->get('estado');
        $interiors->observaciones = $request->get('observaciones');
        $interiors->save();    
        $idperitaje=$interiors->interiorcontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$interiors=$peritaje->piezasinterior;
        $interiors=$peritaje->interiorcontrol->interiorparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->interiorcontrol->user;
        $interiorcontrol=$peritaje->interiorcontrol;
        // return view('vehiculo.sistemainterior')->with('vehiculo', $vehiculo);
        return view('vehiculo.interior')->with(compact('vehiculo','interiors','responsable','interiorcontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interior  $interior
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interior = Interior::find($id);        
        $idperitaje=$interior->interiorcontrol->peritaje->id;
        $interior->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $interiors=$peritaje->interiorcontrol->interiorparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->interiorcontrol->user;
        $interiorcontrol=$peritaje->interiorcontrol;
        // return view('vehiculo.sistemainterior')->with('vehiculo', $vehiculo);interiorcontrol
        return view('vehiculo.interior')->with(compact('vehiculo','interiors','responsable','interiorcontrol'));
    }
}
