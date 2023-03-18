<?php

namespace App\Http\Controllers;

use App\Models\Interiorpart;
use App\Http\Requests\StoreInteriorpartRequest;
use App\Http\Requests\UpdateInteriorpartRequest;
use Illuminate\Http\Request;

class InteriorpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $interiorparts = Interiorpart::paginate(5);
        
        return view('vehiculo.interiorpart.index',compact('interiorparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.interiorpart.create');
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
      $interiorpart = new Interiorpart();
        $interiorpart->name=$request->get('name');
         
        $interiorpart->save();
        return redirect()->route('interiorpart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Interiorpart  $interiorpart
     * @return \Illuminate\Http\Response
     */
    public function show(Interiorpart $interiorpart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Interiorpart  $interiorpart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interiorpart = Interiorpart::find($id);
        return view('vehiculo/interiorpart.edit')->with('interiorpart',$interiorpart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Interiorpart  $interiorpart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $interiorpart =  Interiorpart::find($id);
        $interiorpart->name = $request->get('name');
        $interiorpart->save();    
        
        return redirect()->route('interiorpart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Interiorpart  $interiorpart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $interiorpart=Interiorpart::find($id);
        $interiorpart->delete();
        return redirect()->route('interiorpart.index');
    }
}

     