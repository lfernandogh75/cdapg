<?php

namespace App\Http\Controllers;

use App\Models\Frenopart;
use App\Http\Requests\StoreFrenopartRequest;
use App\Http\Requests\UpdateFrenopartRequest;
use Illuminate\Http\Request;

class FrenopartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frenoparts = Frenopart::paginate(5);
        
        return view('vehiculo.frenopart.index',compact('frenoparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.frenopart.create');
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
      $frenopart = new Frenopart();
        $frenopart->name=$request->get('name');
         
        $frenopart->save();
        return redirect()->route('frenopart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Frenopart  $frenopart
     * @return \Illuminate\Http\Response
     */
    public function show(Frenopart $frenopart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Frenopart  $frenopart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $frenopart = Frenopart::find($id);
        return view('vehiculo/frenopart.edit')->with('frenopart',$frenopart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Frenopart  $frenopart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $frenopart =  Frenopart::find($id);
        $frenopart->name = $request->get('name');
        $frenopart->save();    
        
        return redirect()->route('frenopart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Frenopart  $frenopart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $frenopart=Frenopart::find($id);
        $frenopart->delete();
        return redirect()->route('frenopart.index');
    }
}

     