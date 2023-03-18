<?php

namespace App\Http\Controllers;

use App\Models\Sw;
use App\Http\Requests\StoreSwRequest;
use App\Http\Requests\UpdateSwRequest;
use App\Models\Swpart;
use App\Models\Swcontrol;
use App\Models\Peritaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SwController extends Controller
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
       // $swparts =Swpart::all();
        
   
        if(isset($peritaje->swcontrol)){
            // $equipoparts =Equipopart::all();
            $swparts=SWpart::all()->where('clase_vehiculo','=',$peritaje->vehiculo->clase_vehiculo);
             return view('vehiculo/sw.create',compact('peritaje','swparts'));
         }else{
             $user=Auth::user();
             $swcontrol = new Swcontrol();
             $swcontrol->peritaje_id=$peritaje_id;
             $swcontrol->user_id=$user->id;
             $swcontrol->observacion="N/A";
             $swcontrol->save(); 
     
     
     
             $swparts=Swpart::all()->where('clase_vehiculo','=',$peritaje->vehiculo->clase_vehiculo);
           // $equipoparts=Equipopart::all();
             foreach($swparts as $sw){
                 DB::table('sws')->insert(
                     ['swpart_id' => $sw->id,'swcontrol_id' =>$swcontrol->id]
                    
                  );
             }
     
     
              
             $peritaje=Peritaje::find($peritaje_id);
             $sws=$peritaje->swcontrol->swparts;
             $vehiculo=$peritaje->vehiculo;
             $responsable=$peritaje->swcontrol->user;
             $swcontrol=$peritaje->swcontrol;
             // return view('vehiculo.sistemaequipo')->with('vehiculo', $vehiculo);
             return view('vehiculo.sw')->with(compact('vehiculo','sws','responsable','swcontrol'));
     
         }
   
   
   
   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreswRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $sw = new Sw();
       if(isset($peritaje->swcontrol)){
      
        $sw->swpart_id = $request->get('pieza');
        //$sw->version = $request->get('version');
       // $sw->dispositivo = $request->get('dispositivo');
        $sw->swcontrol_id =  $peritaje->swcontrol->id;
       // $sw->observaciones = $request->get('observaciones');
        $sw->save(); 

       }else{
        $user=Auth::user();
        $swcontrol = new Swcontrol();
        $swcontrol->peritaje_id=$request->get('peritaje_id');
        $swcontrol->user_id=$user->id;
        $swcontrol->observacion="N/A";
        //$swcontrol->nivelaprobado=0;
        $swcontrol->save(); 
        $sw->swpart_id = $request->get('pieza');
       // $sw->version = $request->get('version');
       // $sw->dispositivo = $request->get('dispositivo');
        $sw->swcontrol_id =  $swcontrol->id;
        $sw->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $sws=$peritaje->swcontrol->swparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->swcontrol->user;
        $swcontrol=$peritaje->swcontrol;
        // return view('vehiculo.sistemasw')->with('vehiculo', $vehiculo);
        return view('vehiculo.sw')->with(compact('vehiculo','sws','responsable','swcontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sw  $sw
     * @return \Illuminate\Http\Response
     */
    public function show(Sw $sw)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sw  $sw
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sw = Sw::find($id);
        return view('vehiculo/sw.edit')->with('sw',$sw);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateswRequest  $request
     * @param  \App\Models\Sw  $sw
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $sws =  Sw::find($id);
      //  $sws->version = $request->get('version');
        //$sws->dispositivo = $request->get('dispositivo');
        $sws->save();    
        $idperitaje=$sws->swcontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$sws=$peritaje->piezassw;
        $sws=$peritaje->swcontrol->swparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->swcontrol->user;
        $swcontrol=$peritaje->swcontrol;
        // return view('vehiculo.sistemasw')->with('vehiculo', $vehiculo);
        return view('vehiculo.sw')->with(compact('vehiculo','sws','responsable','swcontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sw  $sw
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sw = Sw::find($id);        
        $idperitaje=$sw->swcontrol->peritaje->id;
        $sw->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $sws=$peritaje->swcontrol->swparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->swcontrol->user;
        $swcontrol=$peritaje->swcontrol;
        // return view('vehiculo.sistemasw')->with('vehiculo', $vehiculo);swcontrol
        return view('vehiculo.sw')->with(compact('vehiculo','sws','responsable','swcontrol'));
    }
}
