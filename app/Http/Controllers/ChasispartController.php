<?php

namespace App\Http\Controllers;

use App\Models\Chasispart;
use App\Http\Requests\StoreChasispartRequest;
use App\Http\Requests\UpdateChasispartRequest;
use Illuminate\Http\Request;

class ChasispartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chasisparts = Chasispart::paginate(5);
        
        return view('vehiculo.chasispart.index',compact('chasisparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.chasispart.create');
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
      $chasispart = new Chasispart();
        $chasispart->name=$request->get('name');
         
        $chasispart->save();
        return redirect()->route('chasispart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Chasispart  $chasispart
     * @return \Illuminate\Http\Response
     */
    public function show(Chasispart $chasispart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chasispart  $chasispart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chasispart = Chasispart::find($id);
        return view('vehiculo/chasispart.edit')->with('chasispart',$chasispart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chasispart  $chasispart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $chasispart =  Chasispart::find($id);
        $chasispart->name = $request->get('name');
        $chasispart->save();    
        
        return redirect()->route('chasispart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chasispart  $chasispart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chasispart=Chasispart::find($id);
        $chasispart->delete();
        return redirect()->route('chasispart.index');
    }
}

     