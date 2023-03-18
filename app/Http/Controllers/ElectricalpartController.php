<?php

namespace App\Http\Controllers;

use App\Models\Electricalpart;
use App\Http\Requests\StoreElectricalpartRequest;
use App\Http\Requests\UpdateElectricalpartRequest;
use Illuminate\Http\Request;

class ElectricalpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $electricalparts = Electricalpart::paginate(5);
        
        return view('vehiculo.electricalpart.index',compact('electricalparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.electricalpart.create');
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
      $electricalpart = new Electricalpart();
        $electricalpart->name=$request->get('name');
         
        $electricalpart->save();
        return redirect()->route('electricalpart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Electricalpart  $electricalpart
     * @return \Illuminate\Http\Response
     */
    public function show(Electricalpart $electricalpart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Electricalpart  $electricalpart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $electricalpart = Electricalpart::find($id);
        return view('vehiculo/electricalpart.edit')->with('electricalpart',$electricalpart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Electricalpart  $electricalpart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $electricalpart =  Electricalpart::find($id);
        $electricalpart->name = $request->get('name');
        $electricalpart->save();    
        
        return redirect()->route('electricalpart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Electricalpart  $electricalpart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $electricalpart=Electricalpart::find($id);
        $electricalpart->delete();
        return redirect()->route('electricalpart.index');
    }
}
