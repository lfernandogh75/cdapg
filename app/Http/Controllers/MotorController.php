<?php

namespace App\Http\Controllers;

use App\Models\Motor;
use App\Http\Requests\StoreMotorRequest;
use App\Http\Requests\UpdateMotorRequest;
use App\Models\Motorpark;
use App\Models\Motorcontrol;
use App\Models\Peritaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MotorController extends Controller
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
      $motorparts =Motorpark::all();
     
      return view('vehiculo/motor.create',compact('peritaje','motorparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMotorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $peritaje=Peritaje::find($request->get('peritaje_id'));
      $motors = new Motor();
       if(isset($peritaje->motorcontrol)){
      
        $motors->motorpark_id = $request->get('pieza');
        $motors->estado = $request->get('estado');
        $motors->tipo = $request->get('tipo');
        $motors->motorcontrol_id =  $peritaje->motorcontrol->id;
        $motors->observaciones = $request->get('observaciones');
        $motors->save(); 

       }else{
        $user=Auth::user();
        $motorcontrol = new Motorcontrol();
        $motorcontrol->peritaje_id=$request->get('peritaje_id');
        $motorcontrol->user_id=$user->id;
        $motorcontrol->observacion="N/A";
        $motorcontrol->nivelaprobado=0;
        $motorcontrol->save(); 
        $motors->motorpark_id = $request->get('pieza');
        $motors->estado = $request->get('estado');
        $motors->tipo = $request->get('tipo');
        $motors->motorcontrol_id =  $motorcontrol->id;
        $motors->observaciones = $request->get('observaciones');
        $motors->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        $motors=$peritaje->motorcontrol->piezasmotors;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->motorcontrol->user;
        $motorcontrol=$peritaje->motorcontrol;
        // return view('vehiculo.sistemamotor')->with('vehiculo', $vehiculo);
        return view('vehiculo.motor')->with(compact('vehiculo','motors','responsable','motorcontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function show(Motor $motor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motor = Motor::find($id);
        return view('vehiculo/motor.edit')->with('motor',$motor);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMotorRequest  $request
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $motors =  Motor::find($id);
        $motors->estado = $request->get('estado');
        $motors->tipo = $request->get('tipo');
        $motors->observaciones = $request->get('observaciones');
        $motors->save();    
        $idperitaje=$motors->motorcontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$motors=$peritaje->piezasmotor;
        $motors=$peritaje->motorcontrol->piezasmotors;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->motorcontrol->user;
        $motorcontrol=$peritaje->motorcontrol;
        // return view('vehiculo.sistemamotor')->with('vehiculo', $vehiculo);
        return view('vehiculo.motor')->with(compact('vehiculo','motors','responsable','motorcontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Motor  $motor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motor = Motor::find($id);        
        $idperitaje=$motor->motorcontrol->peritaje->id;
        $motor->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $motors=$peritaje->motorcontrol->piezasmotors;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->motorcontrol->user;
        $motorcontrol=$peritaje->motorcontrol;
        // return view('vehiculo.sistemamotor')->with('vehiculo', $vehiculo);
        return view('vehiculo.motor')->with(compact('vehiculo','motors','responsable','motorcontrol'));
    }
}
