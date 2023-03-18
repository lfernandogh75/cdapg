<?php

namespace App\Http\Controllers;

use App\Models\Nfluido;
use App\Http\Requests\StoreNfluidoRequest;
use App\Http\Requests\UpdateNfluidoRequest;
use App\Models\Nfluidocontrol;
use App\Models\Peritaje;
use App\Models\fluidopart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NfluidoController extends Controller
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
        $fluidoparts =fluidopart::all();
        return view('vehiculo/nfluido.create',compact('peritaje','fluidoparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorenfluidoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $nfluido = new Nfluido();
       if(isset($peritaje->nfluidocontrol)){
      
        $nfluido->fluidopart_id = $request->get('pieza');
        $nfluido->estado = $request->get('estado');
        $nfluido->nfluidocontrol_id =  $peritaje->nfluidocontrol->id;
        $nfluido->observaciones = $request->get('observaciones');
        $nfluido->save(); 

       }else{
        $user=Auth::user();
        $nfluidocontrol = new Nfluidocontrol();
        $nfluidocontrol->peritaje_id=$request->get('peritaje_id');
        $nfluidocontrol->user_id=$user->id;
        $nfluidocontrol->observacion="N/A";
        $nfluidocontrol->nivelaprobado=0;
        $nfluidocontrol->save(); 
        $nfluido->fluidopart_id = $request->get('pieza');
        $nfluido->estado = $request->get('estado');
        $nfluido->nfluidocontrol_id =  $nfluidocontrol->id;
        $nfluido->observaciones = $request->get('observaciones');
        $nfluido->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $nfluidos=$peritaje->nfluidocontrol->fluidoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->nfluidocontrol->user;
        $nfluidocontrol=$peritaje->nfluidocontrol;
        // return view('vehiculo.sistemanfluido')->with('vehiculo', $vehiculo);
        return view('vehiculo.nfluido')->with(compact('vehiculo','nfluidos','responsable','nfluidocontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nfluido  $nfluido
     * @return \Illuminate\Http\Response
     */
    public function show(Nfluido $nfluido)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nfluido  $nfluido
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $nfluido = Nfluido::find($id);
        return view('vehiculo/nfluido.edit')->with('nfluido',$nfluido);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatenfluidoRequest  $request
     * @param  \App\Models\Nfluido  $nfluido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $nfluidos =  Nfluido::find($id);
        $nfluidos->estado = $request->get('estado');
        $nfluidos->observaciones = $request->get('observaciones');
        $nfluidos->save();    
        $idperitaje=$nfluidos->nfluidocontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$nfluidos=$peritaje->piezasnfluido;
        $nfluidos=$peritaje->nfluidocontrol->fluidoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->nfluidocontrol->user;
        $nfluidocontrol=$peritaje->nfluidocontrol;
        // return view('vehiculo.sistemanfluido')->with('vehiculo', $vehiculo);
        return view('vehiculo.nfluido')->with(compact('vehiculo','nfluidos','responsable','nfluidocontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nfluido  $nfluido
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nfluido = Nfluido::find($id);        
        $idperitaje=$nfluido->nfluidocontrol->peritaje->id;
        $nfluido->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $nfluidos=$peritaje->nfluidocontrol->fluidoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->nfluidocontrol->user;
        $nfluidocontrol=$peritaje->nfluidocontrol;
        // return view('vehiculo.sistemanfluido')->with('vehiculo', $vehiculo);nfluidocontrol
        return view('vehiculo.nfluido')->with(compact('vehiculo','nfluidos','responsable','nfluidocontrol'));
    }
}
