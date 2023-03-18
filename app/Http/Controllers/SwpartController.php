<?php

namespace App\Http\Controllers;

use App\Models\Swpart;
use App\Http\Requests\StoreSwpartRequest;
use App\Http\Requests\UpdateSwpartRequest;
use Illuminate\Http\Request;

class SwpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $swparts = Swpart::paginate(5);
        
        return view('vehiculo.swpart.index',compact('swparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.swpart.create');
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
            'version'=>'required',
            'dispositivo'=>'required',
            'tipo_vehiculo'=>'required'
        ]);
      //  $mark=$request->all();
         
      //  Mark::create($mark);
      $swpart = new Swpart();
        $swpart->name=$request->get('name');
        $swpart->clase_vehiculo=$request->get('tipo_vehiculo');
        $swpart->version = $request->get('version');
        $swpart->dispositivo = $request->get('dispositivo');
        $swpart->save();
        return redirect()->route('swpart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Swpart  $swpart
     * @return \Illuminate\Http\Response
     */
    public function show(Swpart $swpart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Swpart  $swpart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $swpart = Swpart::find($id);
        return view('vehiculo/swpart.edit')->with('swpart',$swpart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Swpart  $swpart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $swpart =  Swpart::find($id);
        $swpart->name = $request->get('name');
        $swpart->clase_vehiculo=$request->get('tipo_vehiculo');
        $swpart->version = $request->get('version');
        $swpart->dispositivo = $request->get('dispositivo');
        $swpart->save();    
        
        return redirect()->route('swpart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Swpart  $swpart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $swpart=Swpart::find($id);
        $swpart->delete();
        return redirect()->route('swpart.index');
    }
}

     