<?php

namespace App\Http\Controllers;

use App\Models\Carroceria;
use Illuminate\Http\Request;

class CarroceriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carrocerias = Carroceria::paginate(5);
        
        return view('vehiculo.carroceria.index',compact('carrocerias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.carroceria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required'
        ]);
      //  $mark=$request->all();
         
      //  Mark::create($mark);
      $carroceria = new Carroceria();
        $carroceria->nombre=$request->get('name');
         
        $carroceria->save();
        return redirect()->route('carroceria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carroceria  $carroceria
     * @return \Illuminate\Http\Response
     */
    public function show(Carroceria $carroceria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carroceria  $carroceria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carroceria = Carroceria::find($id);
        return view('vehiculo/carroceria.edit')->with('carroceria',$carroceria);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carroceria  $carroceria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carroceria =  Carroceria::find($id);
        $carroceria->nombre = $request->get('name');
        $carroceria->save();    
        
        return redirect()->route('carroceria.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carroceria  $carroceria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carroceria=Carroceria::find($id);
        $carroceria->delete();
        return redirect()->route('carroceria.index');
    }
}
