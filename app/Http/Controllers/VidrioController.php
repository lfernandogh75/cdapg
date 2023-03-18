<?php

namespace App\Http\Controllers;

use App\Models\Vidrio;
use App\Http\Requests\StoreVidrioRequest;
use App\Http\Requests\UpdateVidrioRequest;
use App\Models\Peritaje;
use App\Models\Vidriopart;
use App\Models\Vidriocontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VidrioController extends Controller
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
        $vidrioparts =Vidriopart::all();
        return view('vehiculo/vidrio.create',compact('peritaje','vidrioparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVidrioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $vidrio = new Vidrio();
       if(isset($peritaje->vidriocontrol)){
      
        $vidrio->vidriopart_id = $request->get('pieza');
        $vidrio->estado = $request->get('estado');
        $vidrio->vidriocontrol_id =  $peritaje->vidriocontrol->id;
        $vidrio->observaciones = $request->get('observaciones');
        $vidrio->save(); 

       }else{
        $user=Auth::user();
        $vidriocontrol = new Vidriocontrol();
        $vidriocontrol->peritaje_id=$request->get('peritaje_id');
        $vidriocontrol->user_id=$user->id;
        $vidriocontrol->observacion="N/A";
        $vidriocontrol->nivelaprobado=0;
        $vidriocontrol->save(); 
        $vidrio->vidriopart_id = $request->get('pieza');
        $vidrio->estado = $request->get('estado');
        $vidrio->vidriocontrol_id =  $vidriocontrol->id;
        $vidrio->observaciones = $request->get('observaciones');
        $vidrio->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $vidrios=$peritaje->vidriocontrol->vidrioparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->vidriocontrol->user;
        $vidriocontrol=$peritaje->vidriocontrol;
        // return view('vehiculo.sistemavidrio')->with('vehiculo', $vehiculo);
        return view('vehiculo.vidrio')->with(compact('vehiculo','vidrios','responsable','vidriocontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vidrio  $vidrio
     * @return \Illuminate\Http\Response
     */
    public function show(Vidrio $vidrio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vidrio  $vidrio
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $vidrio = Vidrio::find($id);
        return view('vehiculo/vidrio.edit')->with('vidrio',$vidrio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVidrioRequest  $request
     * @param  \App\Models\Vidrio  $vidrio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $vidrios =  Vidrio::find($id);
        $vidrios->estado = $request->get('estado');
        $vidrios->observaciones = $request->get('observaciones');
        $vidrios->save();    
        $idperitaje=$vidrios->vidriocontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$vidrios=$peritaje->piezasvidrio;
        $vidrios=$peritaje->vidriocontrol->vidrioparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->vidriocontrol->user;
        $vidriocontrol=$peritaje->vidriocontrol;
        // return view('vehiculo.sistemavidrio')->with('vehiculo', $vehiculo);
        return view('vehiculo.vidrio')->with(compact('vehiculo','vidrios','responsable','vidriocontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vidrio  $vidrio
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vidrio = Vidrio::find($id);        
        $idperitaje=$vidrio->vidriocontrol->peritaje->id;
        $vidrio->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $vidrios=$peritaje->vidriocontrol->vidrioparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->vidriocontrol->user;
        $vidriocontrol=$peritaje->vidriocontrol;
        // return view('vehiculo.sistemavidrio')->with('vehiculo', $vehiculo);vidriocontrol
        return view('vehiculo.vidrio')->with(compact('vehiculo','vidrios','responsable','vidriocontrol'));
    }
}
