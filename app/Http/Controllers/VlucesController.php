<?php

namespace App\Http\Controllers;

use App\Models\Vluces;
use App\Http\Requests\StorevlucesRequest;
use App\Http\Requests\UpdatevlucesRequest;
use App\Models\Vlucescontrol;
use App\Models\Peritaje;
use App\Models\Luzpart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VlucesController extends Controller
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
        $luzparts =Luzpart::all();
        return view('vehiculo/vluces.create',compact('peritaje','luzparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorevlucesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $vluces = new Vluces();
       if(isset($peritaje->vlucescontrol)){
      
        $vluces->luzpart_id = $request->get('pieza');
        $vluces->estado = $request->get('estado');
        $vluces->vlucescontrol_id =  $peritaje->vlucescontrol->id;
        $vluces->observaciones = $request->get('observaciones');
        $vluces->save(); 

       }else{
        $user=Auth::user();
        $vlucescontrol = new Vlucescontrol();
        $vlucescontrol->peritaje_id=$request->get('peritaje_id');
        $vlucescontrol->user_id=$user->id;
        $vlucescontrol->observacion="N/A";
        $vlucescontrol->nivelaprobado=0;
        $vlucescontrol->save(); 
        $vluces->luzpart_id = $request->get('pieza');
        $vluces->estado = $request->get('estado');
        $vluces->vlucescontrol_id =  $vlucescontrol->id;
        $vluces->observaciones = $request->get('observaciones');
        $vluces->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $vlucess=$peritaje->vlucescontrol->luzparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->vlucescontrol->user;
        $vlucescontrol=$peritaje->vlucescontrol;
        // return view('vehiculo.sistemavluces')->with('vehiculo', $vehiculo);
        return view('vehiculo.vluces')->with(compact('vehiculo','vlucess','responsable','vlucescontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vluces  $vluces
     * @return \Illuminate\Http\Response
     */
    public function show(Vluces $vluces)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vluces  $vluces
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $vluces = Vluces::find($id);
        return view('vehiculo/vluces.edit')->with('vluces',$vluces);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatevlucesRequest  $request
     * @param  \App\Models\Vluces  $vluces
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $vlucess =  Vluces::find($id);
        $vlucess->estado = $request->get('estado');
        $vlucess->observaciones = $request->get('observaciones');
        $vlucess->save();    
        $idperitaje=$vlucess->vlucescontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$vlucess=$peritaje->piezasvluces;
        $vlucess=$peritaje->vlucescontrol->luzparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->vlucescontrol->user;
        $vlucescontrol=$peritaje->vlucescontrol;
        // return view('vehiculo.sistemavluces')->with('vehiculo', $vehiculo);
        return view('vehiculo.vluces')->with(compact('vehiculo','vlucess','responsable','vlucescontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vluces  $vluces
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vluces = Vluces::find($id);        
        $idperitaje=$vluces->vlucescontrol->peritaje->id;
        $vluces->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $vlucess=$peritaje->vlucescontrol->luzparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->vlucescontrol->user;
        $vlucescontrol=$peritaje->vlucescontrol;
        // return view('vehiculo.sistemavluces')->with('vehiculo', $vehiculo);vlucescontrol
        return view('vehiculo.vluces')->with(compact('vehiculo','vlucess','responsable','vlucescontrol'));
    }
}
