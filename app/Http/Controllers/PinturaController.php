<?php

namespace App\Http\Controllers;

use App\Models\Pintura;
use App\Http\Requests\StorePinturaRequest;
use App\Http\Requests\UpdatePinturaRequest;
use App\Models\Peritaje;
use App\Models\Latoneriapart;
use App\Models\Pinturacontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PinturaController extends Controller
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
        $latoneriaparts =Latoneriapart::all();
        return view('vehiculo/pintura.create',compact('peritaje','latoneriaparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepinturaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $pintura = new pintura();
       if(isset($peritaje->pinturacontrol)){
      
        $pintura->latoneriapart_id = $request->get('pieza');
        $pintura->estado = $request->get('estado');
        $pintura->vista = $request->get('vista');
        $pintura->pinturacontrol_id =  $peritaje->pinturacontrol->id;
        $pintura->observaciones = $request->get('observaciones');
        $pintura->perito =  $user->name;
        $pintura->save(); 

       }else{
        
        $pinturacontrol = new pinturacontrol();
        $pinturacontrol->peritaje_id=$request->get('peritaje_id');
        $pinturacontrol->user_id=$user->id;
        $pinturacontrol->observacion="N/A";
        $pinturacontrol->nivelaprobado=0;
        $pinturacontrol->save(); 
        $pintura->latoneriapart_id = $request->get('pieza');
        $pintura->estado = $request->get('estado');
        $pintura->vista = $request->get('vista');
        $pintura->pinturacontrol_id =  $pinturacontrol->id;
        $pintura->observaciones = $request->get('observaciones');
        $pintura->perito =  $user->name;
        $pintura->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $pinturas=$peritaje->pinturacontrol->latoneriaparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->pinturacontrol->user;
        $pinturacontrol=$peritaje->pinturacontrol;
        // return view('vehiculo.sistemapintura')->with('vehiculo', $vehiculo);
        return view('vehiculo.pintura')->with(compact('vehiculo','pinturas','responsable','pinturacontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pintura  $pintura
     * @return \Illuminate\Http\Response
     */
    public function show(pintura $pintura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pintura  $pintura
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $pintura = pintura::find($id);
        return view('vehiculo/pintura.edit')->with('pintura',$pintura);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepinturaRequest  $request
     * @param  \App\Models\pintura  $pintura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        $pinturas =  pintura::find($id);
        $pinturas->estado = $request->get('estado');
        $pinturas->observaciones = $request->get('observaciones');
        $pinturas->vista = $request->get('vista');
        $pinturas->perito =  $user->name;
        $pinturas->save();    
        $idperitaje=$pinturas->pinturacontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$pinturas=$peritaje->piezaspintura;
        $pinturas=$peritaje->pinturacontrol->latoneriaparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->pinturacontrol->user;
        $pinturacontrol=$peritaje->pinturacontrol;
        // return view('vehiculo.sistemapintura')->with('vehiculo', $vehiculo);
        return view('vehiculo.pintura')->with(compact('vehiculo','pinturas','responsable','pinturacontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pintura  $pintura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pintura = pintura::find($id);        
        $idperitaje=$pintura->pinturacontrol->peritaje->id;
        $pintura->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $pinturas=$peritaje->pinturacontrol->latoneriaparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->pinturacontrol->user;
        $pinturacontrol=$peritaje->pinturacontrol;
        // return view('vehiculo.sistemapintura')->with('vehiculo', $vehiculo);pinturacontrol
        return view('vehiculo.pintura')->with(compact('vehiculo','pinturas','responsable','pinturacontrol'));
    }
}
