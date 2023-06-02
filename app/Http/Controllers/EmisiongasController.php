<?php

namespace App\Http\Controllers;

use App\Models\Emisiongas;
use App\Http\Requests\StoreEmisiongasRequest;
use App\Http\Requests\UpdateEmisiongasRequest;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Peritaje;
use Illuminate\Support\Facades\Auth;

class EmisiongasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmisiongasRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $user=Auth::user();
        $peritaje_id=$request->get('peritaje_id');
        $peritaje =Peritaje::find( $peritaje_id);
        $emisiongas= new Emisiongas();

        if( $peritaje->vehiculo->clase_vehiculo=="Motocicleta"){
        $emisiongas->user_id=$user->id;
        $emisiongas->conorma=$request->get('conorma');
       $emisiongas->covlr=$request->get('covlr');
       $emisiongas->counidad=$request->get('counidad');
       $emisiongas->codosnorma=$request->get('codosnorma');
       $emisiongas->codosvlr=$request->get('codosvlr');
       $emisiongas->codosunidad=$request->get('codosunidad');
       $emisiongas->oxnorma=$request->get('oxnorma');
       $emisiongas->oxvlr=$request->get('oxvlr');
       $emisiongas->oxunidad=$request->get('oxunidad');
       $emisiongas->hcnorma=$request->get('hcnorma');
       $emisiongas->hcvlr=$request->get('hcvlr');
       $emisiongas->hcunidad=$request->get('hcunidad');
       $emisiongas->nonorma=$request->get('nonorma');
       $emisiongas->novlr=$request->get('novlr');  
       $emisiongas->nounidad=$request->get('nounidad');  
       $emisiongas->observacion=$request->get('observacion');  
       $emisiongas->peritaje_id=$peritaje->id;
       
       $emisiongas->activo=0;
       $emisiongas->save();
        }

        if( $peritaje->vehiculo->clase_vehiculo!="Motocicleta"&& $peritaje->tarjeta->combustible->nombre!="DIESEL"){
            $emisiongas->user_id=$user->id;
            $emisiongas->conorma=$request->get('conorma');
           $emisiongas->covlr=$request->get('covlr');
           $emisiongas->counidad=$request->get('counidad');
           $emisiongas->codosnorma=$request->get('codosnorma');
           $emisiongas->codosvlr=$request->get('codosvlr');
           $emisiongas->codosunidad=$request->get('codosunidad');
           $emisiongas->oxnorma=$request->get('oxnorma');
           $emisiongas->oxvlr=$request->get('oxvlr');
           $emisiongas->oxunidad=$request->get('oxunidad');
           $emisiongas->hcnorma=$request->get('hcnorma');
           $emisiongas->hcvlr=$request->get('hcvlr');
           $emisiongas->hcunidad=$request->get('hcunidad');
           $emisiongas->nonorma=$request->get('nonorma');
           $emisiongas->novlr=$request->get('novlr');  
           $emisiongas->nounidad=$request->get('nounidad');  
           $emisiongas->conormac=$request->get('conormac');
           $emisiongas->covlrc=$request->get('covlrc');
           $emisiongas->counidadc=$request->get('counidadc');
           $emisiongas->codosnormac=$request->get('codosnormac');
           $emisiongas->codosvlrc=$request->get('codosvlrc');
           $emisiongas->codosunidadc=$request->get('codosunidadc');
           $emisiongas->oxnormac=$request->get('oxnormac');
           $emisiongas->oxvlrc=$request->get('oxvlrc');
           $emisiongas->oxunidadc=$request->get('oxunidadc');
           $emisiongas->hcnormac=$request->get('hcnormac');
           $emisiongas->hcvlrc=$request->get('hcvlrc');
           $emisiongas->hcunidadc=$request->get('hcunidadc');
           $emisiongas->nonormac=$request->get('nonormac');
           $emisiongas->novlrc=$request->get('novlrc');  
           $emisiongas->nounidadc=$request->get('nounidadc'); 
           $emisiongas->observacion=$request->get('observacion');  
           $emisiongas->peritaje_id=$peritaje->id;
           
           $emisiongas->activo=0;
           $emisiongas->save();
            }

        if( $peritaje->tarjeta->combustible->nombre=="DIESEL"){
            $emisiongas->user_id=$user->id;
           $emisiongas->opacidadcuno=$request->get('opacidadcuno');
           $emisiongas->opacidadcunou=$request->get('opacidadcunou');
           $emisiongas->opacidadcdos=$request->get('opacidadcdos');
           $emisiongas->opacidadcdosu=$request->get('opacidadcdosu');
           $emisiongas->opacidadctres=$request->get('opacidadctres');
           $emisiongas->opacidadctresu=$request->get('opacidadctresu');
           $emisiongas->opacidadccuatro=$request->get('opacidadccuatro');
           $emisiongas->opacidadccuatrou=$request->get('opacidadccuatrou');
           $emisiongas->gobernadacuno=$request->get('gobernadacuno');
           $emisiongas->gobernadacunou=$request->get('gobernadacunou');
           $emisiongas->gobernadacdos=$request->get('gobernadacdos');
           $emisiongas->gobernadacdosu=$request->get('gobernadacdosu');
           $emisiongas->gobernadactres=$request->get('gobernadactres');
           $emisiongas->gobernadactresu=$request->get('gobernadactresu');
           $emisiongas->gobernadaccuatro=$request->get('gobernadaccuatro');
           $emisiongas->gobernadaccuatrou=$request->get('gobernadaccuatrou');
           $emisiongas->unidad=$request->get('unidad');
           $emisiongas->norma=$request->get('norma');  
           $emisiongas->resultado=$request->get('resultado');  
           $emisiongas->peritaje_id=$peritaje->id;
           $emisiongas->observacion=$request->get('observacion');
           $emisiongas->activo=0;
           $emisiongas->save();
            }

            



       $placav=$peritaje->vehiculo->placa;
       return redirect( "/vehiculos?placa= $placav&vehiculoindex=1");
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Emisiongas  $emisiongas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $emisiongas=Emisiongas::find($id);
      return view('vehiculo.emisiongas.index')->with(compact('emisiongas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Emisiongas  $emisiongas
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $emisiongas=Emisiongas::find($id);
        
       return view('vehiculo.emisiongas.edit')->with(compact( 'emisiongas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEmisiongasRequest  $request
     * @param  \App\Models\Emisiongas  $emisiongas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $emisiongas= Emisiongas::find($id);


        if( $emisiongas->peritaje->vehiculo->clase_vehiculo=="Motocicleta"){
 
       $emisiongas->conorma=$request->get('conorma');
       $emisiongas->covlr=$request->get('covlr');
       $emisiongas->counidad=$request->get('counidad');
       $emisiongas->codosnorma=$request->get('codosnorma');
       $emisiongas->codosvlr=$request->get('codosvlr');
       $emisiongas->codosunidad=$request->get('codosunidad');
       $emisiongas->oxnorma=$request->get('oxnorma');
       $emisiongas->oxvlr=$request->get('oxvlr');
       $emisiongas->oxunidad=$request->get('oxunidad');
       $emisiongas->hcnorma=$request->get('hcnorma');
       $emisiongas->hcvlr=$request->get('hcvlr');
       $emisiongas->hcunidad=$request->get('hcunidad');
       $emisiongas->nonorma=$request->get('nonorma');
       $emisiongas->novlr=$request->get('novlr');  
       $emisiongas->nounidad=$request->get('nounidad');  
       $emisiongas->observacion=$request->get('observacion');
       $emisiongas->activo=0;
       $emisiongas->save();
 }


 if( $emisiongas->peritaje->vehiculo->clase_vehiculo!="Motocicleta" && $emisiongas->peritaje->tarjeta->combustible->nombre!="DIESEL"){
    $emisiongas->conorma=$request->get('conorma');
    $emisiongas->covlr=$request->get('covlr');
    $emisiongas->counidad=$request->get('counidad');
    $emisiongas->codosnorma=$request->get('codosnorma');
    $emisiongas->codosvlr=$request->get('codosvlr');
    $emisiongas->codosunidad=$request->get('codosunidad');
    $emisiongas->oxnorma=$request->get('oxnorma');
    $emisiongas->oxvlr=$request->get('oxvlr');
    $emisiongas->oxunidad=$request->get('oxunidad');
    $emisiongas->hcnorma=$request->get('hcnorma');
    $emisiongas->hcvlr=$request->get('hcvlr');
    $emisiongas->hcunidad=$request->get('hcunidad');
    $emisiongas->nonorma=$request->get('nonorma');
    $emisiongas->novlr=$request->get('novlr');  
    $emisiongas->nounidad=$request->get('nounidad');  
    $emisiongas->conormac=$request->get('conormac');
    $emisiongas->covlrc=$request->get('covlrc');
    $emisiongas->counidadc=$request->get('counidadc');
    $emisiongas->codosnormac=$request->get('codosnormac');
    $emisiongas->codosvlrc=$request->get('codosvlrc');
    $emisiongas->codosunidadc=$request->get('codosunidadc');
    $emisiongas->oxnormac=$request->get('oxnormac');
    $emisiongas->oxvlrc=$request->get('oxvlrc');
    $emisiongas->oxunidadc=$request->get('oxunidadc');
    $emisiongas->hcnormac=$request->get('hcnormac');
    $emisiongas->hcvlrc=$request->get('hcvlrc');
    $emisiongas->hcunidadc=$request->get('hcunidadc');
    $emisiongas->nonormac=$request->get('nonormac');
    $emisiongas->novlrc=$request->get('novlrc');  
    $emisiongas->nounidadc=$request->get('nounidadc'); 
    $emisiongas->observacion=$request->get('observacion'); 
    $emisiongas->activo=0;
    $emisiongas->save();
 }

 if( $emisiongas->peritaje->tarjeta->combustible->nombre=="DIESEL"){
    $emisiongas->opacidadcuno=$request->get('opacidadcuno');
    $emisiongas->opacidadcunou=$request->get('opacidadcunou');
    $emisiongas->opacidadcdos=$request->get('opacidadcdos');
    $emisiongas->opacidadcdosu=$request->get('opacidadcdosu');
    $emisiongas->opacidadctres=$request->get('opacidadctres');
    $emisiongas->opacidadctresu=$request->get('opacidadctresu');
    $emisiongas->opacidadccuatro=$request->get('opacidadccuatro');
    $emisiongas->opacidadccuatrou=$request->get('opacidadccuatrou');
    $emisiongas->gobernadacuno=$request->get('gobernadacuno');
    $emisiongas->gobernadacunou=$request->get('gobernadacunou');
    $emisiongas->gobernadacdos=$request->get('gobernadacdos');
    $emisiongas->gobernadacdosu=$request->get('gobernadacdosu');
    $emisiongas->gobernadactres=$request->get('gobernadactres');
    $emisiongas->gobernadactresu=$request->get('gobernadactresu');
    $emisiongas->gobernadaccuatro=$request->get('gobernadaccuatro');
    $emisiongas->gobernadaccuatrou=$request->get('gobernadaccuatrou');
    $emisiongas->unidad=$request->get('unidad');
    $emisiongas->norma=$request->get('norma');  
    $emisiongas->resultado=$request->get('resultado');  
    $emisiongas->observacion=$request->get('observacion');
    $emisiongas->activo=0;
    $emisiongas->save();
                
 }



       $placav=$emisiongas->peritaje->vehiculo->placa;
       return redirect( "/vehiculos?placa= $placav&vehiculoindex=1");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Emisiongas  $emisiongas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Emisiongas $emisiongas)
    {
        //
    }
    public function cemisiongas(Request $request)
    {
        $placa=$request->get('placa');
        if($placa=="")
                 return view('vehiculo.index');
        else{
            $vehiculo=Vehiculo::where('placa','=',$placa)->latest()->first();
       return view('vehiculo.emisiongas.create')->with(compact('vehiculo'));
       }
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $emisiongas=$peritaje->emisiongas;
        $emisiongas->activo=1;
        $emisiongas->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $emisiongas=$peritaje->emisiongas;
        $emisiongas->activo=0;
        $emisiongas->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
