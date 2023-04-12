<?php

namespace App\Http\Controllers;

use App\Models\Llanta;
use App\Http\Requests\StoreLlantaRequest;
use App\Http\Requests\UpdateLlantaRequest;
use App\Models\Peritaje;
use App\Models\Llantapart;
use App\Models\Llantacontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LlantaController extends Controller
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
        $llantaparts =Llantapart::all();
        return view('vehiculo/llantas.create',compact('peritaje','llantaparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLlantaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $llanta = new Llanta();
       if(isset($peritaje->llantacontrol)){
      
        $llanta->llantapart_id = $request->get('pieza');
        $llanta->cambio = $request->get('cambio');
        $llanta->labrado =$request->get('labrado');
        $llanta->presion =$request->get('presion');
        $llanta->vidautil =$request->get('vidautil');
        $llanta->llantacontrol_id =  $peritaje->llantacontrol->id;
        $llanta->observaciones = $request->get('observaciones');
        $llanta->perito =  $user->name;
        $llanta->save(); 

       }else{
         
        $llantacontrol = new Llantacontrol();
        $llantacontrol->peritaje_id=$request->get('peritaje_id');
        $llantacontrol->user_id=$user->id;
        $llantacontrol->observacion="N/A";
         $llantacontrol->nivelaprobado=0;
        $llantacontrol->save(); 
        $llanta->llantapart_id = $request->get('pieza');
        $llanta->cambio = $request->get('cambio');
        $llanta->labrado =$request->get('labrado');
        $llanta->presion =$request->get('presion');
        $llanta->vidautil =$request->get('vidautil');
        $llanta->llantacontrol_id =  $llantacontrol->id;
        $llanta->observaciones = $request->get('observaciones');
        $llanta->perito =  $user->name;
        $llanta->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $llantas=$peritaje->llantacontrol->llantaparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->llantacontrol->user;
        $llantacontrol=$peritaje->llantacontrol;
        // return view('vehiculo.sistemallanta')->with('vehiculo', $vehiculo);
        return view('vehiculo.llanta')->with(compact('vehiculo','llantas','responsable','llantacontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Llanta  $llanta
     * @return \Illuminate\Http\Response
     */
    public function show(Llanta $llanta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Llanta  $llanta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $llanta = Llanta::find($id);
        return view('vehiculo/llantas.edit')->with('llanta',$llanta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLlantaRequest  $request
     * @param  \App\Models\Llanta  $llanta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        $llantas =  Llanta::find($id);
        $llantas->cambio = $request->get('cambio');
        $llantas->labrado =$request->get('labrado');
        $llantas->presion =$request->get('presion');
        $llantas->vidautil =$request->get('vidautil');
        $llantas->observaciones = $request->get('observaciones');
        $llantas->perito =  $user->name;
        $llantas->save();    
        $idperitaje=$llantas->llantacontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$llantas=$peritaje->piezasllanta;
        $llantas=$peritaje->llantacontrol->llantaparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->llantacontrol->user;
        $llantacontrol=$peritaje->llantacontrol;
        // return view('vehiculo.sistemallanta')->with('vehiculo', $vehiculo);
        return view('vehiculo.llanta')->with(compact('vehiculo','llantas','responsable','llantacontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Llanta  $llanta
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $llanta = Llanta::find($id);        
        $idperitaje=$llanta->llantacontrol->peritaje->id;
        $llanta->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $llantas=$peritaje->llantacontrol->llantaparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->llantacontrol->user;
        $llantacontrol=$peritaje->llantacontrol;
        // return view('vehiculo.sistemallanta')->with('vehiculo', $vehiculo);
        return view('vehiculo.llanta')->with(compact('vehiculo','llantas','responsable','llantacontrol'));
    }
}
