<?php

namespace App\Http\Controllers;

use App\Models\Archivo;
use App\Http\Requests\StoreArchivoRequest;
use App\Http\Requests\UpdateArchivoRequest;
use App\Models\Peritaje;

use App\Models\Archivocontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArchivoController extends Controller
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
       
        return view('vehiculo/archivo.create',compact('peritaje'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreArchivoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=Auth::user();
       $request->validate([
            'documento'=>'required|mimes:pdf|max:30000'
        ]);
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $archivo = new Archivo();
       if(isset($peritaje->archivocontrol)){
      
        $archivo->nombre = $request->get('nombre');
        if($documento=$request->file('documento')){
            $rutaGuardarDcm='documento/';
            $documentoProducto=date('YmdHis').".".$documento->getClientOriginalExtension();
            $documento->move($rutaGuardarDcm,$documentoProducto);
           // $producto['documento']="$documentoProducto";
           $archivo->ruta ="$documentoProducto";
        }
       // $archivo->documento = $request->get('documento');
        $archivo->observacion = $request->get('observacion');
        $archivo->perito =  $user->name;
        $archivo->archivocontrol_id =  $peritaje->archivocontrol->id;
     
        $archivo->save(); 

       }else{
       
        $archivocontrol = new Archivocontrol();
        $archivocontrol->peritaje_id=$request->get('peritaje_id');
        $archivocontrol->user_id=$user->id;
        $archivocontrol->observacion="N/A";
        $archivocontrol->save(); 
        $archivo->nombre = $request->get('nombre');
        if($documento=$request->file('documento')){
            $rutaGuardarDcm='documento/';
            $documentoProducto=date('YmdHis').".".$documento->getClientOriginalExtension();
            $documento->move($rutaGuardarDcm,$documentoProducto);
           // $producto['documento']="$documentoProducto";
           $archivo->documento ="$documentoProducto";
        }
       // $archivo->documento = $request->get('documento');
        $archivo->observacion = $request->get('observacion');
        
        $archivo->perito =  $user->name;
        $archivo->archivocontrol_id =  $archivocontrol->id;
       
        $archivo->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        $archivos=$peritaje->archivocontrol->archivoparts;
        
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->archivocontrol->user;
        $archivocontrol=$peritaje->archivocontrol;
        // return view('vehiculo.sistemaarchivo')->with('vehiculo', $vehiculo);
        return view('vehiculo.archivo')->with(compact('vehiculo','archivos','responsable','archivocontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $archivo = Archivo::find($id);
        return view('vehiculo/archivo.edit')->with('archivo',$archivo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateArchivoRequest  $request
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $user=Auth::user();
        
        $archivos =  Archivo::find($id);
        if($documento=$request->file('documento')){
            $request->validate([
                'documento'=>'required|mimes:pdf|max:2048'
            ]);
          
            if(isset($documento)){
                if(file_exists("documento/".$archivos->ruta)){
               unlink("documento/".$archivos->ruta);
               }
               }

            $rutaGuardarDcm='documento/';
            $documentoProducto=date('YmdHis').".".$documento->getClientOriginalExtension();
            $documento->move($rutaGuardarDcm,$documentoProducto);
           // $producto['documento']="$documentoProducto";
           $archivos->documento ="$documentoProducto";
          
        }
      //  $archivos->documento = $request->get('documento');
       $archivos->observacion = $request->get('observacion');
     
       $archivos->perito =  $user->name;
        $archivos->save();    
        $idperitaje=$archivos->archivocontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$archivos=$peritaje->piezasarchivo;
        $archivos=$peritaje->archivocontrol->archivoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->archivocontrol->user;
       $archivocontrol=$peritaje->archivocontrol;
        // return view('vehiculo.sistemaarchivo')->with('vehiculo', $vehiculo);
        return view('vehiculo.archivo')->with(compact('vehiculo','responsable','archivocontrol','archivos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $archivo = Archivo::find($id);        
        $idperitaje=$archivo->archivocontrol->peritaje->id;
        if(isset($archivo->ruta)){
            if(file_exists("documento/".$archivo->ruta)){
           unlink("documento/".$archivo->ruta);
           }
           }
      
      
        $archivo->delete();

        $peritaje=Peritaje::find($idperitaje);
        $archivos=$peritaje->archivocontrol->archivoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->archivocontrol->user;
        // return view('vehiculo.sistemaarchivo')->with('vehiculo', $vehiculo);
        $archivocontrol=$peritaje->archivocontrol;
        return view('vehiculo.archivo')->with(compact('vehiculo','archivos','responsable','archivocontrol'));
    }
    public function descarga($id)
    {
        $public_path = public_path();
        $url= $public_path."/documento/".$id;
        return response()->download($url);
        

    }

}
