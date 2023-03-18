<?php

namespace App\Http\Controllers;

use App\Models\Estructurapart;
use App\Http\Requests\StoreEstructurapartRequest;
use App\Http\Requests\UpdateEstructurapartRequest;
use Illuminate\Http\Request;

class EstructurapartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estructuraparts = Estructurapart::paginate(5);
        
        return view('vehiculo.estructurapart.index',compact('estructuraparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.estructurapart.create');
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
      $estructurapart = new Estructurapart();
        $estructurapart->name=$request->get('name');
         
        $estructurapart->save();
        return redirect()->route('estructurapart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estructurapart  $estructurapart
     * @return \Illuminate\Http\Response
     */
    public function show(Estructurapart $estructurapart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estructurapart  $estructurapart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estructurapart = Estructurapart::find($id);
        return view('vehiculo/estructurapart.edit')->with('estructurapart',$estructurapart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estructurapart  $estructurapart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $estructurapart =  Estructurapart::find($id);
        $estructurapart->name = $request->get('name');
        $estructurapart->save();    
        
        return redirect()->route('estructurapart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estructurapart  $estructurapart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estructurapart=Estructurapart::find($id);
        $estructurapart->delete();
        return redirect()->route('estructurapart.index');
    }
}

     