<?php

namespace App\Http\Controllers;

use App\Models\Exteriorpart;
use App\Http\Requests\StoreExteriorpartRequest;
use App\Http\Requests\UpdateExteriorpartRequest;
use Illuminate\Http\Request;

class ExteriorpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exteriorparts = Exteriorpart::paginate(5);
        
        return view('vehiculo.exteriorpart.index',compact('exteriorparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.exteriorpart.create');
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
      $exteriorpart = new Exteriorpart();
        $exteriorpart->name=$request->get('name');
         
        $exteriorpart->save();
        return redirect()->route('exteriorpart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exteriorpart  $exteriorpart
     * @return \Illuminate\Http\Response
     */
    public function show(Exteriorpart $exteriorpart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exteriorpart  $exteriorpart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exteriorpart = Exteriorpart::find($id);
        return view('vehiculo/exteriorpart.edit')->with('exteriorpart',$exteriorpart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exteriorpart  $exteriorpart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exteriorpart =  Exteriorpart::find($id);
        $exteriorpart->name = $request->get('name');
        $exteriorpart->save();    
        
        return redirect()->route('exteriorpart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exteriorpart  $exteriorpart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $exteriorpart=Exteriorpart::find($id);
        $exteriorpart->delete();
        return redirect()->route('exteriorpart.index');
    }
}
