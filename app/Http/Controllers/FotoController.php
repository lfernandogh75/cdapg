<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Http\Requests\StoreFotoRequest;
use App\Http\Requests\UpdateFotoRequest;
use App\Models\Peritaje;
use App\Models\Fotopart;
use App\Models\Fotocontrol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
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
        $fotoparts =Fotopart::all();
        return view('vehiculo/foto.create',compact('peritaje','fotoparts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peritaje=Peritaje::find($request->get('peritaje_id'));
      $foto = new Foto();
       if(isset($peritaje->fotocontrol)){
      
        $foto->fotopart_id = $request->get('pieza');
        if($imagen=$request->file('imagen')){
            $rutaGuardarImg='imagen/';
            $imagenProducto=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg,$imagenProducto);
           // $producto['imagen']="$imagenProducto";
           $foto->imagen ="$imagenProducto";
        }
       // $foto->imagen = $request->get('imagen');
        $foto->observacion = $request->get('observacion');
        
        $foto->fotocontrol_id =  $peritaje->fotocontrol->id;
     
        $foto->save(); 

       }else{
        $user=Auth::user();
        $fotocontrol = new Fotocontrol();
        $fotocontrol->peritaje_id=$request->get('peritaje_id');
        $fotocontrol->user_id=$user->id;
        $fotocontrol->observacion="N/A";
        $fotocontrol->save(); 
        $foto->fotopart_id = $request->get('pieza');
        if($imagen=$request->file('imagen')){
            $rutaGuardarImg='imagen/';
            $imagenProducto=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg,$imagenProducto);
           // $producto['imagen']="$imagenProducto";
           $foto->imagen ="$imagenProducto";
        }
       // $foto->imagen = $request->get('imagen');
        $foto->observacion = $request->get('observacion');
        $foto->fotocontrol_id =  $fotocontrol->id;
       
        $foto->save(); 
       }
        

         
        $peritaje=Peritaje::find($request->get('peritaje_id'));
        
        $fotos=$peritaje->fotocontrol->fotoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->fotocontrol->user;
        $fotocontrol=$peritaje->fotocontrol;
        // return view('vehiculo.sistemafoto')->with('vehiculo', $vehiculo);
        return view('vehiculo.foto')->with(compact('vehiculo','fotos','responsable','fotocontrol'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function show(Foto $foto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $foto = Foto::find($id);
        return view('vehiculo/foto.edit')->with('foto',$foto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFotoRequest  $request
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        
        
        $fotos =  Foto::find($id);
        if($imagen=$request->file('imagen')){
            if(isset($imagen)){
                if(file_exists("imagen/".$fotos->imagen)){
               unlink("imagen/".$fotos->imagen);
               }
               }

            $rutaGuardarImg='imagen/';
            $imagenProducto=date('YmdHis').".".$imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg,$imagenProducto);
           // $producto['imagen']="$imagenProducto";
           $fotos->imagen ="$imagenProducto";
          
        }
      //  $fotos->imagen = $request->get('imagen');
       $fotos->observacion = $request->get('observacion');
        $fotos->save();    
        $idperitaje=$fotos->fotocontrol->peritaje->id;
        $peritaje=Peritaje::find($idperitaje);
        //$fotos=$peritaje->piezasfoto;
        $fotos=$peritaje->fotocontrol->fotoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->fotocontrol->user;
       $fotocontrol=$peritaje->fotocontrol;
        // return view('vehiculo.sistemafoto')->with('vehiculo', $vehiculo);
        return view('vehiculo.foto')->with(compact('vehiculo','fotos','responsable','fotocontrol'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Foto  $foto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foto = Foto::find($id);        
        $idperitaje=$foto->fotocontrol->peritaje->id;
        if(isset($foto->imagen)){
            if(file_exists("imagen/".$foto->imagen)){
           unlink("imagen/".$foto->imagen);
           }
           }
      
      
        $foto->delete();

        $peritaje=Peritaje::find($idperitaje);
        $fotos=$peritaje->fotocontrol->fotoparts;
        $vehiculo=$peritaje->vehiculo;
        $responsable=$peritaje->fotocontrol->user;
        // return view('vehiculo.sistemafoto')->with('vehiculo', $vehiculo);
        $fotocontrol=$peritaje->fotocontrol;
        return view('vehiculo.foto')->with(compact('vehiculo','fotos','responsable','fotocontrol'));
    }
}
