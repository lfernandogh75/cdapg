<?php

namespace App\Http\Controllers;

use App\Models\Compresionpart;
use App\Http\Requests\StoreCompresionpartRequest;
use App\Http\Requests\UpdateCompresionpartRequest;
use Illuminate\Http\Request;

class CompresionpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compresionparts = Compresionpart::paginate(5);
        
        return view('vehiculo.compresionpart.index',compact('compresionparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.compresionpart.create');
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
      $compresionpart = new Compresionpart();
        $compresionpart->name=$request->get('name');
         
        $compresionpart->save();
        return redirect()->route('compresionpart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compresionpart  $compresionpart
     * @return \Illuminate\Http\Response
     */
    public function show(Compresionpart $compresionpart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compresionpart  $compresionpart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $compresionpart = Compresionpart::find($id);
        return view('vehiculo/compresionpart.edit')->with('compresionpart',$compresionpart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compresionpart  $compresionpart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $compresionpart =  Compresionpart::find($id);
        $compresionpart->name = $request->get('name');
        $compresionpart->save();    
        
        return redirect()->route('compresionpart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compresionpart  $compresionpart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $compresionpart=Compresionpart::find($id);
        $compresionpart->delete();
        return redirect()->route('compresionpart.index');
    }
}

     