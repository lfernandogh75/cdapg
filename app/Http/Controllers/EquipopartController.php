<?php

namespace App\Http\Controllers;

use App\Models\Equipopart;
use App\Http\Requests\StoreEquipopartRequest;
use App\Http\Requests\UpdateEquipopartRequest;
use Illuminate\Http\Request;

class EquipopartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
     public function __construct(){
        $this->middleware('superadmin');
    }
    
     public function index()
    {
        $equipoparts = Equipopart::paginate(5);
        
        return view('vehiculo.equipopart.index',compact('equipoparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.equipopart.create');
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
            'name'=>'required',
            'tipo_vehiculo'=>'required',
            'marca'=>'required',
            'serial'=>'required',
            'banco'=>'required',
            'pef'=>'required',
            'ltoe'=>'required',
            'tipo_vehiculo'=>'required'
        ]);
      //  $mark=$request->all();
         
      //  Mark::create($mark);
      $equipopart = new Equipopart();
        $equipopart->name=$request->get('name');
        $equipopart->clase_vehiculo=$request->get('tipo_vehiculo');
        $equipopart->marca = $request->get('marca');
        $equipopart->serial = $request->get('serial');
        $equipopart->banco = $request->get('banco');
        $equipopart->pef = $request->get('pef');
        $equipopart->ltoe = $request->get('ltoe');
         
        $equipopart->save();
        return redirect()->route('equipopart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipopart  $equipopart
     * @return \Illuminate\Http\Response
     */
    public function show(Equipopart $equipopart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipopart  $equipopart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipopart = Equipopart::find($id);
        return view('vehiculo/equipopart.edit')->with('equipopart',$equipopart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipopart  $equipopart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'tipo_vehiculo'=>'required',
            'marca'=>'required',
            'serial'=>'required',
            'banco'=>'required',
            'pef'=>'required',
            'ltoe'=>'required',
            'tipo_vehiculo'=>'required'
        ]);
        $equipopart =  Equipopart::find($id);
        $equipopart->clase_vehiculo=$request->get('tipo_vehiculo');
        $equipopart->name = $request->get('name');
        $equipopart->marca = $request->get('marca');
        $equipopart->serial = $request->get('serial');
        $equipopart->banco = $request->get('banco');
        $equipopart->pef = $request->get('pef');
        $equipopart->ltoe = $request->get('ltoe');
        $equipopart->save();    
        
        return redirect()->route('equipopart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipopart  $equipopart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $equipopart=Equipopart::find($id);
        $equipopart->delete();
        return redirect()->route('equipopart.index');
    }
}

     