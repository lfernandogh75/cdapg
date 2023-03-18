<?php

namespace App\Http\Controllers;

use App\Models\Luzpart;
use App\Http\Requests\StoreLuzpartRequest;
use App\Http\Requests\UpdateLuzpartRequest;
use Illuminate\Http\Request;

class LuzpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $luzparts = Luzpart::paginate(5);
        
        return view('vehiculo.luzpart.index',compact('luzparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.luzpart.create');
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
      $luzpart = new Luzpart();
        $luzpart->name=$request->get('name');
         
        $luzpart->save();
        return redirect()->route('luzpart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Luzpart  $luzpart
     * @return \Illuminate\Http\Response
     */
    public function show(Luzpart $luzpart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Luzpart  $luzpart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $luzpart = Luzpart::find($id);
        return view('vehiculo/luzpart.edit')->with('luzpart',$luzpart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Luzpart  $luzpart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $luzpart =  Luzpart::find($id);
        $luzpart->name = $request->get('name');
        $luzpart->save();    
        
        return redirect()->route('luzpart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Luzpart  $luzpart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $luzpart=Luzpart::find($id);
        $luzpart->delete();
        return redirect()->route('luzpart.index');
    }
}

     