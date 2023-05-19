<?php

namespace App\Http\Controllers;

use App\Models\Suspension;
use App\Http\Requests\StoreSuspensionRequest;
use App\Http\Requests\UpdateSuspensionRequest;
use App\Models\Peritaje;
use App\Models\Suspensionpart;
use App\Models\Suspensioncontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuspensionmController extends Controller
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
        $suspensionparts =Suspensionpart::all();
        $mecanizado="si";
        return view('vehiculo/suspensions.create',compact('peritaje','suspensionparts','mecanizado'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuspensionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $suspension = new Suspension();
       if(isset($peritaje->suspensioncontrol)){
      
        $suspension->suspensionpart_id = $request->get('pieza');
        $suspension->cambio = "1";
        $suspension->porcentaje = $request->get('porcentaje');
        $suspension->suspensioncontrol_id =  $peritaje->suspensioncontrol->id;
        $suspension->observaciones ="N/A";
        $suspension->estado = "1";
        $suspension->perito =  $user->name;
        $suspension->save(); 

       }else{
        
        $suspensioncontrol = new Suspensioncontrol();
        $suspensioncontrol->peritaje_id=$request->get('peritaje_id');
        $suspensioncontrol->user_id=$user->id;
        $suspensioncontrol->observacion="N/A";
        $suspensioncontrol->nivelaprobado=0;
        $suspensioncontrol->save(); 
        $suspension->suspensionpart_id = $request->get('pieza');
        $suspension->cambio ="1";
        $suspension->porcentaje = $request->get('porcentaje');
        $suspension->suspensioncontrol_id =  $suspensioncontrol->id;
        $suspension->observaciones = "N/A";
        $suspension->estado ="1";
        $suspension->perito =  $user->name;
        $suspension->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $suspensions=$peritaje->suspensioncontrol->suspensionparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->suspensioncontrol->user;
        $suspensioncontrol=$peritaje->suspensioncontrol;
        // return view('vehiculo.sistemasuspension')->with('vehiculo', $vehiculo);
        return view('vehiculo.suspensionmecanizada')->with(compact('vehiculo','suspensions','responsable','suspensioncontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suspension  $suspension
     * @return \Illuminate\Http\Response
     */
    public function show(Suspension $suspension)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suspension  $suspension
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $suspension = Suspension::find($id);
        $mecanizado="si";
        return view('vehiculo/suspensions.edit')->with(compact('suspension','mecanizado'));
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuspensionRequest  $request
     * @param  \App\Models\Suspension  $suspension
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        $suspensions =  Suspension::find($id);
        $suspensions->porcentaje = $request->get('porcentaje');
        
        $suspensions->perito =  $user->name;
        $suspensions->save();    
        $idperitaje=$suspensions->suspensioncontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$suspensions=$peritaje->piezassuspension;
        $suspensions=$peritaje->suspensioncontrol->suspensionparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->suspensioncontrol->user;
        $suspensioncontrol=$peritaje->suspensioncontrol;
        // return view('vehiculo.sistemasuspension')->with('vehiculo', $vehiculo);
        return view('vehiculo.suspensionmecanizada')->with(compact('vehiculo','suspensions','responsable','suspensioncontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suspension  $suspension
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suspension = Suspension::find($id);        
        $idperitaje=$suspension->suspensioncontrol->peritaje->id;
        $suspension->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $suspensions=$peritaje->suspensioncontrol->suspensionparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->suspensioncontrol->user;
        $suspensioncontrol=$peritaje->suspensioncontrol;
        // return view('vehiculo.sistemasuspension')->with('vehiculo', $vehiculo);
        return view('vehiculo.suspensionmecanizada')->with(compact('vehiculo','suspensions','responsable','suspensioncontrol'));
    }
}
