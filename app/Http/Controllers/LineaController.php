<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Linea;
use App\Models\Marca;

class LineaController extends Controller
{
    public function index()
    {
        $lineas = Linea::paginate(5);
        return view('vehiculo.linea.index',compact('lineas'));
    }
    public function create()
    {
        $marcas = Marca::all();
        return view('vehiculo.linea.create',compact('marcas'));
        
    }
    public function store(Request $request)
    {
        //
        
            $request->validate([
                'nombre'=>'required','select-marca'=>'required'
            ]);
         
      //  $mark=$request->all();
         
      //  Mark::create($mark);
      $linea = new Linea();
        $linea->nombre=$request->get('nombre');
        $linea->marca_id=$request->get('select-marca');
         
        $linea->save();
        return redirect()->route('linea.index');
    }
    public function edit($id)
    {
        $linea = Linea::find($id);
        return view('vehiculo/linea.edit')->with('linea',$linea);
    }
    public function update(Request $request, $id)
    {
        $linea =  Linea::find($id);
        $linea->nombre = $request->get('name');
        $linea->save();    
        
        return redirect()->route('linea.index');
    }
    public function destroy($id)
    {
        $linea=Linea::find($id);
        $linea->delete();
        return redirect()->route('linea.index');
    }
}
