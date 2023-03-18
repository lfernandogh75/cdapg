<?php

namespace App\Http\Controllers;

use App\Models\Estructura;
use App\Http\Requests\StoreEstructuraRequest;
use App\Http\Requests\UpdateEstructuraRequest;
use App\Models\Peritaje;
use App\Models\Estructurapart;
use App\Models\Estructuracontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EstructuraController extends Controller
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
        $estructuraparts =Estructurapart::all();
        return view('vehiculo/estructura.create',compact('peritaje','estructuraparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstructuraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $estructura = new Estructura();
       if(isset($peritaje->estructuracontrol)){
      
        $estructura->estructurapart_id = $request->get('pieza');
        $estructura->estado = $request->get('estado');
        $estructura->vista = $request->get('vista');
        $estructura->estructuracontrol_id =  $peritaje->estructuracontrol->id;
        $estructura->observaciones = $request->get('observaciones');
        $estructura->save(); 

       }else{
        $user=Auth::user();
        $estructuracontrol = new Estructuracontrol();
        $estructuracontrol->peritaje_id=$request->get('peritaje_id');
        $estructuracontrol->user_id=$user->id;
        $estructuracontrol->observacion="N/A";
        $estructuracontrol->nivelaprobado=0;
        $estructuracontrol->save(); 
        $estructura->estructurapart_id = $request->get('pieza');
        $estructura->estado = $request->get('estado');
        $estructura->vista = $request->get('vista');
        $estructura->estructuracontrol_id =  $estructuracontrol->id;
        $estructura->observaciones = $request->get('observaciones');
        $estructura->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $estructuras=$peritaje->estructuracontrol->estructuraparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->estructuracontrol->user;
        $estructuracontrol=$peritaje->estructuracontrol;
        // return view('vehiculo.sistemaestructura')->with('vehiculo', $vehiculo);
        return view('vehiculo.estructura')->with(compact('vehiculo','estructuras','responsable','estructuracontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estructura  $estructura
     * @return \Illuminate\Http\Response
     */
    public function show(Estructura $estructura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estructura  $estructura
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $estructura = Estructura::find($id);
        return view('vehiculo/estructura.edit')->with('estructura',$estructura);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstructuraRequest  $request
     * @param  \App\Models\Estructura  $estructura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $estructuras =  Estructura::find($id);
        $estructuras->estado = $request->get('estado');
        $estructuras->observaciones = $request->get('observaciones');
        $estructuras->vista = $request->get('vista');
        $estructuras->save();    
        $idperitaje=$estructuras->estructuracontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$estructuras=$peritaje->piezasestructura;
        $estructuras=$peritaje->estructuracontrol->estructuraparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->estructuracontrol->user;
        $estructuracontrol=$peritaje->estructuracontrol;
        // return view('vehiculo.sistemaestructura')->with('vehiculo', $vehiculo);
        return view('vehiculo.estructura')->with(compact('vehiculo','estructuras','responsable','estructuracontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estructura  $estructura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estructura = Estructura::find($id);        
        $idperitaje=$estructura->estructuracontrol->peritaje->id;
        $estructura->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $estructuras=$peritaje->estructuracontrol->estructuraparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->estructuracontrol->user;
        $estructuracontrol=$peritaje->estructuracontrol;
        // return view('vehiculo.sistemaestructura')->with('vehiculo', $vehiculo);estructuracontrol
        return view('vehiculo.estructura')->with(compact('vehiculo','estructuras','responsable','estructuracontrol'));
    }
}
