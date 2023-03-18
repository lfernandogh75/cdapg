<?php

namespace App\Http\Controllers;

use App\Models\Latoneriapart;
use App\Http\Requests\StoreLatoneriapartRequest;
use App\Http\Requests\UpdateLatoneriapartRequest;
use Illuminate\Http\Request;

class LatoneriapartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $latoneriaparts = Latoneriapart::paginate(5);
        
        return view('vehiculo.latoneriapart.index',compact('latoneriaparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.latoneriapart.create');
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
      $latoneriapart = new Latoneriapart();
        $latoneriapart->name=$request->get('name');
         
        $latoneriapart->save();
        return redirect()->route('latoneriapart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Latoneriapart  $latoneriapart
     * @return \Illuminate\Http\Response
     */
    public function show(Latoneriapart $latoneriapart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Latoneriapart  $latoneriapart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $latoneriapart = Latoneriapart::find($id);
        return view('vehiculo/latoneriapart.edit')->with('latoneriapart',$latoneriapart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Latoneriapart  $latoneriapart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $latoneriapart =  Latoneriapart::find($id);
        $latoneriapart->name = $request->get('name');
        $latoneriapart->save();    
        
        return redirect()->route('latoneriapart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Latoneriapart  $latoneriapart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $latoneriapart=Latoneriapart::find($id);
        $latoneriapart->delete();
        return redirect()->route('latoneriapart.index');
    }
}

     