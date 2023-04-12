<?php

namespace App\Http\Controllers;

use App\Models\Fluido;
use App\Http\Requests\StoreFluidoRequest;
use App\Http\Requests\UpdateFluidoRequest;
use App\Models\Peritaje;
use App\Models\Fluidopart;
use App\Models\Fluidocontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FluidoController extends Controller
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
        $fluidoparts =Fluidopart::all();
        return view('vehiculo/fluidos.create',compact('peritaje','fluidoparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFluidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $fluido = new Fluido();
       if(isset($peritaje->fluidocontrol)){
      
        $fluido->fluidopart_id = $request->get('pieza');
        $fluido->estado = $request->get('estado');
        $fluido->fluidocontrol_id =  $peritaje->fluidocontrol->id;
        $fluido->observaciones = $request->get('observaciones');
        $fluido->perito =  $user->name;
        $fluido->save(); 

       }else{
       
        $fluidocontrol = new Fluidocontrol();
        $fluidocontrol->peritaje_id=$request->get('peritaje_id');
        $fluidocontrol->user_id=$user->id;
        $fluidocontrol->observacion="N/A";
        $fluidocontrol->nivelaprobado=0;
        $fluidocontrol->save(); 
        $fluido->fluidopart_id = $request->get('pieza');
        $fluido->estado = $request->get('estado');
        $fluido->fluidocontrol_id =  $fluidocontrol->id;
        $fluido->observaciones = $request->get('observaciones');
        $fluido->perito =  $user->name;
        $fluido->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $fluidos=$peritaje->fluidocontrol->fluidoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->fluidocontrol->user;
        $fluidocontrol=$peritaje->fluidocontrol;
        // return view('vehiculo.sistemafluido')->with('vehiculo', $vehiculo);
        return view('vehiculo.fluido')->with(compact('vehiculo','fluidos','responsable','fluidocontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fluido  $fluido
     * @return \Illuminate\Http\Response
     */
    public function show(Fluido $fluido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fluido  $fluido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $fluido = Fluido::find($id);
        return view('vehiculo/fluidos.edit')->with('fluido',$fluido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFluidoRequest  $request
     * @param  \App\Models\Fluido  $fluido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        $fluidos =  Fluido::find($id);
        $fluidos->estado = $request->get('estado');
        $fluidos->observaciones = $request->get('observaciones');
        $fluidos->perito =  $user->name;
        $fluidos->save();    
        $idperitaje=$fluidos->fluidocontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$fluidos=$peritaje->piezasfluido;
        $fluidos=$peritaje->fluidocontrol->fluidoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->fluidocontrol->user;
        $fluidocontrol=$peritaje->fluidocontrol;
        // return view('vehiculo.sistemafluido')->with('vehiculo', $vehiculo);
        return view('vehiculo.fluido')->with(compact('vehiculo','fluidos','responsable','fluidocontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fluido  $fluido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fluido = Fluido::find($id);        
        $idperitaje=$fluido->fluidocontrol->peritaje->id;
        $fluido->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $fluidos=$peritaje->fluidocontrol->fluidoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->fluidocontrol->user;
        $fluidocontrol=$peritaje->fluidocontrol;
        // return view('vehiculo.sistemafluido')->with('vehiculo', $vehiculo);fluidocontrol
        return view('vehiculo.fluido')->with(compact('vehiculo','fluidos','responsable','fluidocontrol'));
    }
}
