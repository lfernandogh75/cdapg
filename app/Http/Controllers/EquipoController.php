<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Equipo;
use App\Http\Requests\StoreEquipoRequest;
use App\Http\Requests\UpdateEquipoRequest;
use App\Models\Equipopart;
use App\Models\Equipocontrol;
use App\Models\Peritaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EquipoController extends Controller
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
     if(isset($peritaje->equipocontrol)){
       // $equipoparts =Equipopart::all();
       $equipoparts=Equipopart::all()->where('clase_vehiculo','=',$peritaje->vehiculo->clase_vehiculo);
        return view('vehiculo/equipo.create',compact('peritaje','equipoparts'));
    }else{
        $user=Auth::user();
        $equipocontrol = new Equipocontrol();
        $equipocontrol->peritaje_id=$peritaje_id;
        $equipocontrol->user_id=$user->id;
        $equipocontrol->observacion="N/A";
        $equipocontrol->save(); 



        $equipoparts=Equipopart::all()->where('clase_vehiculo','=',$peritaje->vehiculo->clase_vehiculo);
      // $equipoparts=Equipopart::all();
        foreach($equipoparts as $equipo){
            DB::table('equipos')->insert(
                ['equipopart_id' => $equipo->id,'equipocontrol_id' =>$equipocontrol->id]
               
             );
        }


         
        $peritaje=Peritaje::find($peritaje_id);
        $equipos=$peritaje->equipocontrol->equipoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->equipocontrol->user;
        $equipocontrol=$peritaje->equipocontrol;
        // return view('vehiculo.sistemaequipo')->with('vehiculo', $vehiculo);
        return view('vehiculo.equipo')->with(compact('vehiculo','equipos','responsable','equipocontrol'));

    }
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreequipoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $equipo = new Equipo();
       if(isset($peritaje->equipocontrol)){
      
        $equipo->equipopart_id = $request->get('pieza');
      /*  $equipo->marca = $request->get('marca');
        $equipo->serial = $request->get('serial');
        $equipo->banco = $request->get('banco');
        $equipo->pef = $request->get('pef');
        $equipo->ltoe = $request->get('ltoe');*/
        $equipo->equipocontrol_id =  $peritaje->equipocontrol->id;
      
        $equipo->save(); 

       }else{
        $user=Auth::user();
        $equipocontrol = new Equipocontrol();
        $equipocontrol->peritaje_id=$request->get('peritaje_id');
        $equipocontrol->user_id=$user->id;
        $equipocontrol->observacion="N/A";
        $equipocontrol->save(); 
        $equipo->equipopart_id = $request->get('pieza');
      /*  $equipo->marca = $request->get('marca');
        $equipo->serial = $request->get('serial');
        $equipo->banco = $request->get('banco');
        $equipo->pef = $request->get('pef');
        $equipo->ltoe = $request->get('ltoe');*/
        $equipo->equipocontrol_id =  $equipocontrol->id;
        
        $equipo->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $equipos=$peritaje->equipocontrol->equipoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->equipocontrol->user;
        $equipocontrol=$peritaje->equipocontrol;
        // return view('vehiculo.sistemaequipo')->with('vehiculo', $vehiculo);
        return view('vehiculo.equipo')->with(compact('vehiculo','equipos','responsable','equipocontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Equipo $equipo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $equipo = Equipo::find($id);
        return view('vehiculo/equipo.edit')->with('equipo',$equipo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateequipoRequest  $request
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $equipos =  Equipo::find($id);
       /* $equipos->marca = $request->get('marca');
        $equipos->serial = $request->get('serial');
        $equipos->banco = $request->get('banco');
        $equipos->pef = $request->get('pef');
        $equipos->ltoe = $request->get('ltoe');*/
        $equipos->save();    
        $idperitaje=$equipos->equipocontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$equipos=$peritaje->piezasequipo;
        $equipos=$peritaje->equipocontrol->equipoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->equipocontrol->user;
        $equipocontrol=$peritaje->equipocontrol;
        // return view('vehiculo.sistemaequipo')->with('vehiculo', $vehiculo);
        return view('vehiculo.equipo')->with(compact('vehiculo','equipos','responsable','equipocontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id);        
        $idperitaje=$equipo->equipocontrol->peritaje->id;
        $equipo->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $equipos=$peritaje->equipocontrol->equipoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->equipocontrol->user;
        $equipocontrol=$peritaje->equipocontrol;
        // return view('vehiculo.sistemaequipo')->with('vehiculo', $vehiculo);equipocontrol
        return view('vehiculo.equipo')->with(compact('vehiculo','equipos','responsable','equipocontrol'));
    }
}
