<?php

namespace App\Http\Controllers;

use App\Models\Luz;
use App\Http\Requests\StoreLuzRequest;
use App\Http\Requests\UpdateLuzRequest;
use App\Models\Peritaje;
use App\Models\Luzpart;
use App\Models\Luzcontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LuzController extends Controller
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
        return view('vehiculo/luzs.create',compact('peritaje','luzparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLuzRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $luz = new Luz();
       if(isset($peritaje->luzcontrol)){
      
        $luz->luzpart_id = $request->get('pieza');
        $luz->intensidad = $request->get('intensidad');
        $luz->minimo =$request->get('minimo');
        $luz->unidad =$request->get('unidad');
        $luz->inclinacion =$request->get('inclinacion');
        $luz->rango = $request->get('rango');
        $luz->luzcontrol_id =  $peritaje->luzcontrol->id;
       
        $luz->save(); 

       }else{
        $user=Auth::user();
        $luzcontrol = new Luzcontrol();
        $luzcontrol->peritaje_id=$request->get('peritaje_id');
        $luzcontrol->user_id=$user->id;
        $luzcontrol->observacion="N/A";
        $luzcontrol->nivelaprobado=0;
        $luzcontrol->save(); 
        $luz->luzpart_id = $request->get('pieza');
        $luz->intensidad = $request->get('intensidad');
        $luz->minimo =$request->get('minimo');
        $luz->unidad =$request->get('unidad');
        $luz->inclinacion =$request->get('inclinacion');
        $luz->rango = $request->get('rango');
        $luz->luzcontrol_id =  $luzcontrol->id;
       
        $luz->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $luzs=$peritaje->luzcontrol->luzparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->luzcontrol->user;
        $luzcontrol=$peritaje->luzcontrol;
        // return view('vehiculo.sistemaluz')->with('vehiculo', $vehiculo);
        return view('vehiculo.luz')->with(compact('vehiculo','luzs','responsable','luzcontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Luz  $luz
     * @return \Illuminate\Http\Response
     */
    public function show(Luz $luz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Luz  $luz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $luz = Luz::find($id);
        return view('vehiculo/luzs.edit')->with('luz',$luz);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLuzRequest  $request
     * @param  \App\Models\Luz  $luz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $luzs =  Luz::find($id);
        $luzs->intensidad = $request->get('intensidad');
        $luzs->minimo =$request->get('minimo');
        $luzs->unidad =$request->get('unidad');
        $luzs->inclinacion =$request->get('inclinacion');
        $luzs->rango = $request->get('rango');
        $luzs->save();    
        $idperitaje=$luzs->luzcontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$luzs=$peritaje->piezasluz;
        $luzs=$peritaje->luzcontrol->luzparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->luzcontrol->user;
        $luzcontrol=$peritaje->luzcontrol;
        // return view('vehiculo.sistemaluz')->with('vehiculo', $vehiculo);
        return view('vehiculo.luz')->with(compact('vehiculo','luzs','responsable','luzcontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Luz  $luz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $luz = Luz::find($id);        
        $idperitaje=$luz->luzcontrol->peritaje->id;
        $luz->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $luzs=$peritaje->luzcontrol->luzparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->luzcontrol->user;
        $luzcontrol=$peritaje->luzcontrol;
        // return view('vehiculo.sistemaluz')->with('vehiculo', $vehiculo);
        return view('vehiculo.luz')->with(compact('vehiculo','luzs','responsable','luzcontrol'));
    }
}
