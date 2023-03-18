<?php

namespace App\Http\Controllers;

use App\Models\Freno;
use App\Http\Requests\StoreFrenoRequest;
use App\Http\Requests\UpdateFrenoRequest;
use App\Models\Peritaje;
use App\Models\Frenopart;
use App\Models\Frenocontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrenoController extends Controller
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
        $frenoparts =Frenopart::all();
        return view('vehiculo/freno.create',compact('peritaje','frenoparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFrenoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $freno = new Freno();
       if(isset($peritaje->frenocontrol)){
      
        $freno->frenopart_id = $request->get('pieza');
        $freno->eficiencia = $request->get('eficiencia');
        $freno->minimo = $request->get('minimo');
        $freno->fuerza = $request->get('fuerza');
        $freno->peso = $request->get('peso');
        $freno->unidad = $request->get('unidad');
        $freno->frenocontrol_id =  $peritaje->frenocontrol->id;
     
        $freno->save(); 

       }else{
        $user=Auth::user();
        $frenocontrol = new Frenocontrol();
        $frenocontrol->peritaje_id=$request->get('peritaje_id');
        $frenocontrol->user_id=$user->id;
        $frenocontrol->observacion="N/A";
        $frenocontrol->nivelaprobado=0;
        $frenocontrol->save(); 
        $freno->frenopart_id = $request->get('pieza');
        $freno->eficiencia = $request->get('eficiencia');
        $freno->minimo = $request->get('minimo');
        $freno->fuerza = $request->get('fuerza');
        $freno->peso = $request->get('peso');
        $freno->unidad = $request->get('unidad');
        $freno->frenocontrol_id =  $frenocontrol->id;
       
        $freno->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $frenos=$peritaje->frenocontrol->frenoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->frenocontrol->user;
       $frenocontrol= $peritaje->frenocontrol;
        // return view('vehiculo.sistemafreno')->with('vehiculo', $vehiculo);
        return view('vehiculo.freno')->with(compact('vehiculo','frenos','responsable','frenocontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Freno  $freno
     * @return \Illuminate\Http\Response
     */
    public function show(Freno $freno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Freno  $freno
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $freno = Freno::find($id);
        return view('vehiculo/freno.edit')->with('freno',$freno);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFrenoRequest  $request
     * @param  \App\Models\Freno  $freno
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $frenos =  Freno::find($id);
        $frenos->eficiencia = $request->get('eficiencia');
        $frenos->minimo = $request->get('minimo');
        $frenos->fuerza = $request->get('fuerza');
        $frenos->peso = $request->get('peso');
        $frenos->unidad = $request->get('unidad');
        $frenos->save();    
        $idperitaje=$frenos->frenocontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$frenos=$peritaje->piezasfreno;
        $frenos=$peritaje->frenocontrol->frenoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->frenocontrol->user;
        $frenocontrol= $peritaje->frenocontrol;
        // return view('vehiculo.sistemafreno')->with('vehiculo', $vehiculo);
        return view('vehiculo.freno')->with(compact('vehiculo','frenos','responsable','frenocontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Freno  $freno
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $freno = Freno::find($id);        
        $idperitaje=$freno->frenocontrol->peritaje->id;
        $freno->delete();

        $peritaje=Peritaje::find($idperitaje);
        $frenos=$peritaje->frenocontrol->frenoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->frenocontrol->user;
        $frenocontrol= $peritaje->frenocontrol;
        // return view('vehiculo.sistemafreno')->with('vehiculo', $vehiculo);
        return view('vehiculo.freno')->with(compact('vehiculo','frenos','responsable','frenocontrol'));
    }
}
