<?php

namespace App\Http\Controllers;

use App\Models\Compresion;
use App\Http\Requests\StoreCompresionRequest;
use App\Http\Requests\UpdateCompresionRequest;
use App\Models\Peritaje;
use App\Models\Compresionpart;
use App\Models\Compresioncontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompresionController extends Controller
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
        $compresionparts =Compresionpart::all();
        return view('vehiculo/compresion.create',compact('peritaje','compresionparts'));
    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCompresionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $compresion = new Compresion();
       if(isset($peritaje->compresioncontrol)){
      
        $compresion->compresionpart_id = $request->get('pieza');
        $compresion->compresion = $request->get('compresion');
        $compresion->fuga =$request->get('fuga');
        $compresion->compresioncontrol_id =  $peritaje->compresioncontrol->id;
        $compresion->perito =  $user->name;
        $compresion->save(); 

       }else{
       
        $compresioncontrol = new Compresioncontrol();
        $compresioncontrol->peritaje_id=$request->get('peritaje_id');
        $compresioncontrol->user_id=$user->id;
        $compresioncontrol->observacion="N/A";
        $compresioncontrol->nivelaprobado=0;
        $compresioncontrol->save(); 
        $compresion->compresionpart_id = $request->get('pieza');
        $compresion->compresion = $request->get('compresion');
        $compresion->fuga =$request->get('fuga');
        $compresion->compresioncontrol_id =  $compresioncontrol->id;
        $compresion->perito =  $user->name;
        $compresion->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $compresions=$peritaje->compresioncontrol->compresionparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->compresioncontrol->user;
        $compresioncontrol=$peritaje->compresioncontrol;
        // return view('vehiculo.sistemacompresion')->with('vehiculo', $vehiculo);
        return view('vehiculo.compresion')->with(compact('vehiculo','compresions','responsable','compresioncontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compresion  $compresion
     * @return \Illuminate\Http\Response
     */
    public function show(Compresion $compresion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compresion  $compresion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $compresion = Compresion::find($id);
        return view('vehiculo/compresion.edit')->with('compresion',$compresion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCompresionRequest  $request
     * @param  \App\Models\Compresion  $compresion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        $compresions =  Compresion::find($id);
        $compresions->compresion = $request->get('compresion');
        $compresions->fuga =$request->get('fuga');
        $compresions->perito =  $user->name;
        $compresions->save();    
        $idperitaje=$compresions->compresioncontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$compresions=$peritaje->piezascompresion;
        $compresions=$peritaje->compresioncontrol->compresionparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->compresioncontrol->user;
        $compresioncontrol=$peritaje->compresioncontrol;
        // return view('vehiculo.sistemacompresion')->with('vehiculo', $vehiculo);
        return view('vehiculo.compresion')->with(compact('vehiculo','compresions','responsable','compresioncontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compresion  $compresion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compresion = Compresion::find($id);        
        $idperitaje=$compresion->compresioncontrol->peritaje->id;
        $compresion->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $compresions=$peritaje->compresioncontrol->compresionparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->compresioncontrol->user;
        $compresioncontrol=$peritaje->compresioncontrol;
        // return view('vehiculo.sistemacompresion')->with('vehiculo', $vehiculo);
        return view('vehiculo.compresion')->with(compact('vehiculo','compresions','responsable','compresioncontrol'));
    }
}
