<?php

namespace App\Http\Controllers;

use App\Models\Chasis;
use App\Http\Requests\StoreChasisRequest;
use App\Http\Requests\UpdateChasisRequest;
use App\Models\Peritaje;
use App\Models\Chasispart;
use App\Models\Chasiscontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChasisController extends Controller
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
        $chasisparts =Chasispart::all();
        return view('vehiculo/chasis.create',compact('peritaje','chasisparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreChasisRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $chasis = new Chasis();
       if(isset($peritaje->chasiscontrol)){
      
        $chasis->chasispart_id = $request->get('pieza');
        $chasis->estado = $request->get('estado');
        $chasis->chasiscontrol_id =  $peritaje->chasiscontrol->id;
        $chasis->observaciones = $request->get('observaciones');
        $chasis->perito = $user->name;
        $chasis->save(); 

       }else{
       
        $chasiscontrol = new Chasiscontrol();
        $chasiscontrol->peritaje_id=$request->get('peritaje_id');
        $chasiscontrol->user_id=$user->id;
        $chasiscontrol->observacion="N/A";
        $chasiscontrol->nivelaprobado=0;
        $chasiscontrol->save(); 
        $chasis->chasispart_id = $request->get('pieza');
        $chasis->estado = $request->get('estado');
        $chasis->chasiscontrol_id =  $chasiscontrol->id;
        $chasis->observaciones = $request->get('observaciones');
        $chasis->perito = $user->name;
        $chasis->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $chasiss=$peritaje->chasiscontrol->chasisparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->chasiscontrol->user;
        $chasiscontrol=$peritaje->chasiscontrol;
        // return view('vehiculo.sistemachasis')->with('vehiculo', $vehiculo);
        return view('vehiculo.chasis')->with(compact('vehiculo','chasiss','responsable','chasiscontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chasis  $chasis
     * @return \Illuminate\Http\Response
     */
    public function show(Chasis $chasis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chasis  $chasis
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $chasis = Chasis::find($id);
        return view('vehiculo/chasis.edit')->with('chasis',$chasis);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateChasisRequest  $request
     * @param  \App\Models\Chasis  $chasis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        $chasiss =  Chasis::find($id);
        $chasiss->estado = $request->get('estado');
        $chasiss->observaciones = $request->get('observaciones');
        $chasiss->perito = $user->name;
        $chasiss->save();    
        $idperitaje=$chasiss->chasiscontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$chasiss=$peritaje->piezaschasis;
        $chasiss=$peritaje->chasiscontrol->chasisparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->chasiscontrol->user;
        $chasiscontrol=$peritaje->chasiscontrol;
        // return view('vehiculo.sistemachasis')->with('vehiculo', $vehiculo);
        return view('vehiculo.chasis')->with(compact('vehiculo','chasiss','responsable','chasiscontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chasis  $chasis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chasis = Chasis::find($id);        
        $idperitaje=$chasis->chasiscontrol->peritaje->id;
        $chasis->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $chasiss=$peritaje->chasiscontrol->chasisparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->chasiscontrol->user;
        $chasiscontrol=$peritaje->chasiscontrol;
        // return view('vehiculo.sistemachasis')->with('vehiculo', $vehiculo);chasiscontrol
        return view('vehiculo.chasis')->with(compact('vehiculo','chasiss','responsable','chasiscontrol'));
    }
}
