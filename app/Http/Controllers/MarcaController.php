<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::paginate(5);
        
        return view('vehiculo.marca.index',compact('marcas'));
    }
    public function create()
    {
        //
        return view('vehiculo.marca.create');
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'=>'required'
        ]);
      //  $mark=$request->all();
         
      //  Mark::create($mark);
      $marca = new Marca();
        $marca->nombre=$request->get('name');
         
        $marca->save();
        return redirect()->route('marca.index');
    }
    public function edit($id)
    {
        $marca = Marca::find($id);
        return view('vehiculo/marca.edit')->with('marca',$marca);
    }
    public function update(Request $request, $id)
    {
        $marca =  Marca::find($id);
        $marca->nombre = $request->get('name');
        $marca->save();    
        
        return redirect()->route('marca.index');
    }
    public function destroy($id)
    {
        $marca=Marca::find($id);
        $marca->delete();
        return redirect()->route('marca.index');
    }
}
