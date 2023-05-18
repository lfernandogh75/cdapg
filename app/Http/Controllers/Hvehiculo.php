<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cierre;
use App\Models\Peritaje;
use App\Models\Vehiculo;
use App\Models\Empresa;
use Illuminate\Support\Facades\Auth;

class Hvehiculo extends Controller
{

    public function show($id)
    {
       $cierre=Cierre::find($id);
       return view('vehiculo.hvehiculo.edit')->with(compact('cierre'));
  
    }

    public function edit($id)
    {   $cierre=Cierre::find($id);
        
         
       // $vehiculo=Vehiculo::find($cierre->peritaje_id);
       // return view('vehiculo.moto')->with('marcas', $marcas);
       return view('vehiculo.hvehiculo.edit')->with(compact('cierre'));
    }

    public function update(Request $request, $id)
    {

        $cierre=Cierre::find($id);

        $cierre->rtm=$request->get('rtm');
        $cierre->fechartmvigente=$request->get('fechartmvigente');
        $cierre->soat=$request->get('soat');
        $cierre->fechasoatvigente=$request->get('fechasoatvigente');
        $cierre->embargo=$request->get('embargo');
        $cierre->observacionhv=$request->get('observacionhv');
        
       $cierre->save();
       $placa=$cierre->peritaje->vehiculo->placa;
       return redirect( "/vehiculos?placa=$placa&vehiculoindex=1");
        
    }
}
