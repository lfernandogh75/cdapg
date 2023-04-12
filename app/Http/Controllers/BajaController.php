<?php

namespace App\Http\Controllers;

use App\Models\Baja;
use App\Http\Requests\StoreBajaRequest;
use App\Http\Requests\UpdateBajaRequest;
use App\Models\Bajapart;
use App\Models\Bajacontrol;
use App\Models\Peritaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BajaController extends Controller
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
        $bajaparts =Bajapart::all();
        return view('vehiculo/baja.create',compact('peritaje','bajaparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebajaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $baja = new Baja();
       if(isset($peritaje->bajacontrol)){
      
        $baja->bajapart_id = $request->get('pieza');
        $baja->estado = $request->get('estado');
        $baja->bajacontrol_id =  $peritaje->bajacontrol->id;
        $baja->observaciones = $request->get('observaciones');
        $baja->perito =  $user->name;
        $baja->save(); 

       }else{
        
        $bajacontrol = new Bajacontrol();
        $bajacontrol->peritaje_id=$request->get('peritaje_id');
        $bajacontrol->user_id=$user->id;
        $bajacontrol->observacion="N/A";
        $bajacontrol->nivelaprobado=0;
        $bajacontrol->save(); 
        $baja->bajapart_id = $request->get('pieza');
        $baja->estado = $request->get('estado');
        $baja->bajacontrol_id =  $bajacontrol->id;
        $baja->observaciones = $request->get('observaciones');
        $baja->perito =  $user->name;
        $baja->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $bajas=$peritaje->bajacontrol->bajaparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->bajacontrol->user;
        $bajacontrol=$peritaje->bajacontrol;
        // return view('vehiculo.sistemabaja')->with('vehiculo', $vehiculo);
        return view('vehiculo.baja')->with(compact('vehiculo','bajas','responsable','bajacontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function show(Baja $baja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $baja = Baja::find($id);
        return view('vehiculo/baja.edit')->with('baja',$baja);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebajaRequest  $request
     * @param  \App\Models\Baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        $bajas =  Baja::find($id);
        $bajas->estado = $request->get('estado');
        $bajas->observaciones = $request->get('observaciones');
        $bajas->perito =  $user->name;
        $bajas->save();    
        $idperitaje=$bajas->bajacontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$bajas=$peritaje->piezasbaja;
        $bajas=$peritaje->bajacontrol->bajaparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->bajacontrol->user;
        $bajacontrol=$peritaje->bajacontrol;
        // return view('vehiculo.sistemabaja')->with('vehiculo', $vehiculo);
        return view('vehiculo.baja')->with(compact('vehiculo','bajas','responsable','bajacontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Baja  $baja
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baja = Baja::find($id);        
        $idperitaje=$baja->bajacontrol->peritaje->id;
        $baja->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $bajas=$peritaje->bajacontrol->bajaparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->bajacontrol->user;
        $bajacontrol=$peritaje->bajacontrol;
        // return view('vehiculo.sistemabaja')->with('vehiculo', $vehiculo);bajacontrol
        return view('vehiculo.baja')->with(compact('vehiculo','bajas','responsable','bajacontrol'));
    }
}
