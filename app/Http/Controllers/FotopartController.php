<?php

namespace App\Http\Controllers;

use App\Models\Fotopart;
use App\Http\Requests\StoreFotopartRequest;
use App\Http\Requests\UpdateFotopartRequest;
use Illuminate\Http\Request;

class FotopartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fotoparts = Fotopart::paginate(5);
        
        return view('vehiculo.fotopart.index',compact('fotoparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.fotopart.create');
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
      $fotopart = new Fotopart();
        $fotopart->name=$request->get('name');
         
        $fotopart->save();
        return redirect()->route('fotopart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fotopart  $fotopart
     * @return \Illuminate\Http\Response
     */
    public function show(Fotopart $fotopart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fotopart  $fotopart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fotopart = Fotopart::find($id);
        return view('vehiculo/fotopart.edit')->with('fotopart',$fotopart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fotopart  $fotopart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fotopart =  Fotopart::find($id);
        $fotopart->name = $request->get('name');
        $fotopart->save();    
        
        return redirect()->route('fotopart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fotopart  $fotopart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fotopart=Fotopart::find($id);
        $fotopart->delete();
        return redirect()->route('fotopart.index');
    }
}

     