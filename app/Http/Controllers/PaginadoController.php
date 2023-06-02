<?php

namespace App\Http\Controllers;

use App\Models\Paginado;
use App\Http\Requests\StorePaginadoRequest;
use App\Http\Requests\UpdatePaginadoRequest;
use App\Models\Paginadocontrol;
use App\Models\Peritaje;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaginadoController extends Controller
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
        
        return view('vehiculo/paginado.create',compact('peritaje'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorepaginadoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $paginado = new Paginado();
       if(isset($peritaje->paginadocontrol)){
      
        
        $paginado->nombre = $request->get('nombre');
        $paginado->activo = $request->get('activo');
        $paginado->paginadocontrol_id =  $peritaje->paginadocontrol->id;
       
        $paginado->save(); 

       }else{
        
        $paginadocontrol = new Paginadocontrol();
        $paginadocontrol->peritaje_id=$request->get('peritaje_id');
        $paginadocontrol->user_id=$user->id;
        $paginadocontrol->save(); 

        $partes=["REGISTRO FOTOGRAFICO","LATONERIA",
        "PINTURA","CHASIS Y PARTES BAJAS","FUGAS Y NIVELES",
        "EXTERIOR Y INTERIOR","REVISION LUCES Y ELECTRICOS",
    "FRENOS Y LLANTAS","COMPRESION MOTOR Y SUSPENSION MECANIZADA",
"RESULTADO LUCES Y ESTADO SUSPENSION","EMISION DE GASES",
"PARTES DEL MOTOR Y ESCANER","HISTORICO","VIDRIOS","POLÍTICAS"];
         
         foreach($partes as $nombre){
            DB::table('paginados')->insert(
                ['nombre' =>$nombre,'paginadocontrol_id' =>$paginadocontrol->id]
               
             );
        }
        DB::table('paginados')->insert(
            ['nombre' =>'PIE DE PAGINA 1','valor'=>300,'paginadocontrol_id' =>$paginadocontrol->id]
           
         );
         DB::table('paginados')->insert(
            ['nombre' =>'PIE DE PAGINA 2','valor'=>550,'paginadocontrol_id' =>$paginadocontrol->id]
           
         );
        
        
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $paginados=$peritaje->paginadocontrol->paginadoparts;
        $vehiculo=$peritaje->vehiculo;
       
        $paginadocontrol=$peritaje->paginadocontrol;
        // return view('vehiculo.sistemapaginado')->with('vehiculo', $vehiculo);
        return view('vehiculo.paginado')->with(compact('vehiculo','paginados','paginadocontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paginado  $paginado
     * @return \Illuminate\Http\Response
     */
    public function show(Paginado $paginado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paginado  $paginado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $paginado = Paginado::find($id);
        return view('vehiculo/paginado.edit')->with('paginado',$paginado);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatepaginadoRequest  $request
     * @param  \App\Models\Paginado  $paginado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        $paginados =  Paginado::find($id);
        $paginados->activo = $request->get('activo');
        $paginados->valor = $request->get('valor');
        $paginados->save();    
        $idperitaje=$paginados->paginadocontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        
        $paginados=$peritaje->paginadocontrol->paginadoparts;
        $vehiculo=$peritaje->vehiculo;
        $paginadocontrol=$peritaje->paginadocontrol;
        // return view('vehiculo.sistemapaginado')->with('vehiculo', $vehiculo);
        return view('vehiculo.paginado')->with(compact('vehiculo','paginados','paginadocontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paginado  $paginado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paginado = Paginado::find($id);        
        $idperitaje=$paginado->paginadocontrol->peritaje->id;
        $paginado->delete();

        
        $peritaje=Peritaje::find($idperitaje);
        $paginados=$peritaje->paginadocontrol->paginadoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->paginadocontrol->user;
        $paginadocontrol=$peritaje->paginadocontrol;
        // return view('vehiculo.sistemapaginado')->with('vehiculo', $vehiculo);paginadocontrol
        return view('vehiculo.paginado')->with(compact('vehiculo','paginados','responsable','paginadocontrol'));
    }
}
