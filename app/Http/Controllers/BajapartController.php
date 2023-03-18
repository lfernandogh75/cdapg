<?php

namespace App\Http\Controllers;

use App\Models\Bajapart;
use App\Http\Requests\StoreBajapartRequest;
use App\Http\Requests\UpdateBajapartRequest;
use Illuminate\Http\Request;

class BajapartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bajaparts = Bajapart::paginate(5);
        
        return view('vehiculo.bajapart.index',compact('bajaparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.bajapart.create');
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
      $bajapart = new Bajapart();
        $bajapart->name=$request->get('name');
         
        $bajapart->save();
        return redirect()->route('bajapart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bajapart  $bajapart
     * @return \Illuminate\Http\Response
     */
    public function show(Bajapart $bajapart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bajapart  $bajapart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bajapart = Bajapart::find($id);
        return view('vehiculo/bajapart.edit')->with('bajapart',$bajapart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bajapart  $bajapart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $bajapart =  Bajapart::find($id);
        $bajapart->name = $request->get('name');
        $bajapart->save();    
        
        return redirect()->route('bajapart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bajapart  $bajapart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bajapart=Bajapart::find($id);
        $bajapart->delete();
        return redirect()->route('bajapart.index');
    }
}

     