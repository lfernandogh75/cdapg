<?php

namespace App\Http\Controllers;

use App\Models\Latoneria;
use App\Http\Requests\StoreLatoneriaRequest;
use App\Http\Requests\UpdateLatoneriaRequest;
use App\Models\Peritaje;
use App\Models\Latoneriapart;
use App\Models\Latoneriacontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LatoneriaController extends Controller
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
        $latoneriaparts =Latoneriapart::all();
        return view('vehiculo/latoneria.create',compact('peritaje','latoneriaparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLatoneriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $latoneria = new Latoneria();
       if(isset($peritaje->latoneriacontrol)){
      
        $latoneria->latoneriapart_id = $request->get('pieza');
        $latoneria->estado = $request->get('estado');
        $latoneria->vista = $request->get('vista');
        $latoneria->latoneriacontrol_id =  $peritaje->latoneriacontrol->id;
        $latoneria->observaciones = $request->get('observaciones');
        $latoneria->perito =  $user->name;
        $latoneria->save(); 

       }else{
      
        $latoneriacontrol = new Latoneriacontrol();
        $latoneriacontrol->peritaje_id=$request->get('peritaje_id');
        $latoneriacontrol->user_id=$user->id;
        $latoneriacontrol->observacion="N/A";
        $latoneriacontrol->nivelaprobado=0;
        $latoneriacontrol->save(); 
        $latoneria->latoneriapart_id = $request->get('pieza');
        $latoneria->estado = $request->get('estado');
        $latoneria->vista = $request->get('vista');
        $latoneria->latoneriacontrol_id =  $latoneriacontrol->id;
        $latoneria->observaciones = $request->get('observaciones');
        $latoneria->perito =  $user->name;
        $latoneria->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $latonerias=$peritaje->latoneriacontrol->latoneriaparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->latoneriacontrol->user;
        $latoneriacontrol=$peritaje->latoneriacontrol;
        // return view('vehiculo.sistemalatoneria')->with('vehiculo', $vehiculo);
        return view('vehiculo.latoneria')->with(compact('vehiculo','latonerias','responsable','latoneriacontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Latoneria  $latoneria
     * @return \Illuminate\Http\Response
     */
    public function show(Latoneria $latoneria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Latoneria  $latoneria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $latoneria = Latoneria::find($id);
        return view('vehiculo/latoneria.edit')->with('latoneria',$latoneria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLatoneriaRequest  $request
     * @param  \App\Models\Latoneria  $latoneria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        $latonerias =  Latoneria::find($id);
        $latonerias->estado = $request->get('estado');
        $latonerias->observaciones = $request->get('observaciones');
        $latonerias->vista = $request->get('vista');
        $latonerias->perito =  $user->name;
        $latonerias->save();    
        $idperitaje=$latonerias->latoneriacontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$latonerias=$peritaje->piezaslatoneria;
        $latonerias=$peritaje->latoneriacontrol->latoneriaparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->latoneriacontrol->user;
        $latoneriacontrol=$peritaje->latoneriacontrol;
        // return view('vehiculo.sistemalatoneria')->with('vehiculo', $vehiculo);
        return view('vehiculo.latoneria')->with(compact('vehiculo','latonerias','responsable','latoneriacontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Latoneria  $latoneria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $latoneria = Latoneria::find($id);        
        $idperitaje=$latoneria->latoneriacontrol->peritaje->id;
        $latoneria->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $latonerias=$peritaje->latoneriacontrol->latoneriaparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->latoneriacontrol->user;
        $latoneriacontrol=$peritaje->latoneriacontrol;
        // return view('vehiculo.sistemalatoneria')->with('vehiculo', $vehiculo);latoneriacontrol
        return view('vehiculo.latoneria')->with(compact('vehiculo','latonerias','responsable','latoneriacontrol'));
    }
}
