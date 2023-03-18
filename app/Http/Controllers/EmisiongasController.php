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
        $emisiongas->user_id=$user->id;
       $emisiongas->conorma=$request->get('conorma');
       $emisiongas->covlr=$request->get('covlr');
       $emisiongas->codosnorma=$request->get('codosnorma');
       $emisiongas->codosvlr=$request->get('codosvlr');
       $emisiongas->oxnorma=$request->get('oxnorma');
       $emisiongas->oxvlr=$request->get('oxvlr');
       $emisiongas->hcnorma=$request->get('hcnorma');
       $emisiongas->hcvlr=$request->get('hcvlr');
       $emisiongas->nonorma=$request->get('nonorma');
       $emisiongas->novlr=$request->get('novlr');  
       $emisiongas->unidad=$request->get('unidad');  
       $emisiongas->peritaje_id=$peritaje->id;
       $emisiongas->observacion=$request->get('observacion');
       $emisiongas->activo=0;
       $emisiongas->save();
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

        $emisiongas= Emisiongas::find($id);;
 
       $emisiongas->conorma=$request->get('conorma');
       $emisiongas->covlr=$request->get('covlr');
       $emisiongas->codosnorma=$request->get('codosnorma');
       $emisiongas->codosvlr=$request->get('codosvlr');
       $emisiongas->oxnorma=$request->get('oxnorma');
       $emisiongas->oxvlr=$request->get('oxvlr');
       $emisiongas->hcnorma=$request->get('hcnorma');
       $emisiongas->hcvlr=$request->get('hcvlr');
       $emisiongas->nonorma=$request->get('nonorma');
       $emisiongas->novlr=$request->get('novlr');  
       $emisiongas->unidad=$request->get('unidad');  
       $emisiongas->observacion=$request->get('observacion');
       $emisiongas->activo=0;
       $emisiongas->save();
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
