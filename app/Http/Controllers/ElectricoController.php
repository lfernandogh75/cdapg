<?php

namespace App\Http\Controllers;

use App\Models\Electrico;
use App\Models\Electricocontrol;
use App\Models\Peritaje;
use Illuminate\Http\Request;
use App\Models\Electricalpart;
use Illuminate\Support\Facades\Auth;
class ElectricoController extends Controller
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
       // return view('vehiculo/motos/sistemaelectricos.create');
     //  return view('vehiculo/motos/sistemaelectricos.create')->with('peritaje_id', $peritaje_id);
    $peritaje=Peritaje::find($peritaje_id);
    $electricalparts =Electricalpart::all();
     return view('vehiculo/sistemaelectricos.create',compact('peritaje','electricalparts'));
    
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        $electricos = new Electrico();
        if(isset($peritaje->electricocontrol)){
        $electricos->electricalpart_id = $request->get('pieza');
        $electricos->estado = $request->get('estado');
        $electricos->tipo = $request->get('tipo');
        $electricos->electricocontrol_id =$peritaje->electricocontrol->id ;
        $electricos->observaciones = $request->get('observaciones');
        $electricos->perito =  $user->name;
        $electricos->save(); 
    }else{
      
        $electricocontrol = new Electricocontrol();
        $electricocontrol->peritaje_id=$request->get('peritaje_id');
        $electricocontrol->user_id=$user->id;
        $electricocontrol->observacion="N/A";
        $electricocontrol->nivelaprobado=0;
        $electricocontrol->save(); 
        $electricos->electricalpart_id = $request->get('pieza');
        $electricos->estado = $request->get('estado');
        $electricos->tipo = $request->get('tipo');
        $electricos->electricocontrol_id =  $electricocontrol->id;
        $electricos->observaciones = $request->get('observaciones');
        $electricos->perito =  $user->name;
        $electricos->save(); 
       }

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        $electricos=$peritaje->electricocontrol->piezaselectricas;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->electricocontrol->user;
        $electricocontrol=$peritaje->electricocontrol;
        // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
        return view('vehiculo.sistemaelectrico')->with(compact('vehiculo','electricos','responsable','electricocontrol'));


        



        /* $request->validate([
            'pieza'=>'required', 'estado'=>'required', 'tipo'=>'required','peritaje_id'=>'required'
        ]);
        $electricos=$request->all();
        Electrico::create($electricos);
        return redirect()->route('sistemaelectrico');*/

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Electrico  $electrico
     * @return \Illuminate\Http\Response
     */
    public function show(Electrico $electrico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Electrico  $electrico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $electrico = Electrico::find($id);
        return view('vehiculo/sistemaelectricos.edit')->with('electrico',$electrico);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Electrico  $electrico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        $electricos =  Electrico::find($id);
        $electricos->estado = $request->get('estado');
        $electricos->tipo = $request->get('tipo');
        $electricos->observaciones = $request->get('observaciones');
        $electricos->perito =  $user->name;
        $electricos->save();   
        $idperitaje=$electricos->electricocontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje); 

        //$peritaje=Peritaje::find( $electricos->peritaje_id);
        //$electricos=$peritaje->piezaselectricas;
        $electricos=$peritaje->electricocontrol->piezaselectricas;
        $responsable=$peritaje->electricocontrol->user;
        $vehiculo=$peritaje->vehiculo;
        $electricocontrol=$peritaje->electricocontrol;
        // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
        return view('vehiculo.sistemaelectrico')->with(compact('vehiculo','electricos','responsable','electricocontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Electrico  $electrico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $electrico = Electrico::find($id);        
        $idperitaje=$electrico->electricocontrol->peritaje->id;
        $electrico->delete();

       
        $peritaje=Peritaje::find($idperitaje);
        $electricos=$peritaje->electricocontrol->piezaselectricas;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->motorcontrol->user;
        $electricocontrol=$peritaje->electricocontrol;
        // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
        return view('vehiculo.sistemaelectrico')->with(compact('vehiculo','electricos','responsable','electricocontrol'));
    }
}
