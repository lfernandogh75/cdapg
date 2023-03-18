<?php

namespace App\Http\Controllers;

use App\Models\Simetria;
use App\Http\Requests\StoreSimetriaRequest;
use App\Http\Requests\UpdateSimetriaRequest;
use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Peritaje;
use Illuminate\Support\Facades\Auth;

class SimetriaController extends Controller
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
     * @param  \App\Http\Requests\StoreSimetriaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $user=Auth::user();
        $peritaje_id=$request->get('peritaje_id');
        $peritaje =Peritaje::find( $peritaje_id);
        $simetria= new Simetria();
        $simetria->user_id=$user->id;
        $simetria->sderecho=$request->get('sderecho');
        $simetria->smedio=$request->get('smedio');
        $simetria->sizquierdo=$request->get('sizquierdo');
        $simetria->iderecho=$request->get('iderecho');
        $simetria->imedio=$request->get('imedio');
        $simetria->iizquierdo=$request->get('iizquierdo');
        $simetria->nivelaprobado=$request->get('nivelaprobado');
       $simetria->peritaje_id=$peritaje->id;
       $simetria->observacion=$request->get('observacion');
       $simetria->activo=0;
       $simetria->save();
       $placav=$peritaje->vehiculo->placa;
       return redirect( "/vehiculos?placa= $placav&vehiculoindex=1");
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Simetria  $simetria
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $simetria=Simetria::find($id);
      return view('vehiculo.simetria.index')->with(compact('simetria'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simetria  $simetria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $simetria=Simetria::find($id);
        
       return view('vehiculo.simetria.edit')->with(compact( 'simetria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSimetriaRequest  $request
     * @param  \App\Models\Simetria  $simetria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $simetria= Simetria::find($id);;
 
        $simetria->sderecho=$request->get('sderecho');
        $simetria->smedio=$request->get('smedio');
        $simetria->sizquierdo=$request->get('sizquierdo');
        $simetria->iderecho=$request->get('iderecho');
        $simetria->imedio=$request->get('imedio');
        $simetria->iizquierdo=$request->get('iizquierdo');
        $simetria->nivelaprobado=$request->get('nivelaprobado');
        
       
       $simetria->observacion=$request->get('observacion');
       $simetria->activo=0;
       $simetria->save();
       $placav=$simetria->peritaje->vehiculo->placa;
       return redirect( "/vehiculos?placa= $placav&vehiculoindex=1");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simetria  $simetria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simetria $simetria)
    {
        //
    }
    public function csimetria(Request $request)
    {
        $placa=$request->get('placa');
        if($placa=="")
                 return view('vehiculo.index');
        else{
            $vehiculo=Vehiculo::where('placa','=',$placa)->latest()->first();
       return view('vehiculo.simetria.create')->with(compact('vehiculo'));
       }
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $simetria=$peritaje->simetria;
        $simetria->activo=1;
        $simetria->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $simetria=$peritaje->simetria;
        $simetria->activo=0;
        $simetria->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
