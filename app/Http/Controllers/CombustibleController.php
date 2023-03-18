<?php

namespace App\Http\Controllers;

use App\Models\Combustible;
use Illuminate\Http\Request;

class CombustibleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $combustibles = combustible::paginate(5);
        
        return view('vehiculo.combustible.index',compact('combustibles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.combustible.create');
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
      $combustible = new Combustible();
        $combustible->nombre=$request->get('name');
         
        $combustible->save();
        return redirect()->route('combustible.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Combustible  $combustible
     * @return \Illuminate\Http\Response
     */
    public function show(Combustible $combustible)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Combustible  $combustible
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $combustible = Combustible::find($id);
        return view('vehiculo/combustible.edit')->with('combustible',$combustible);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Combustible  $combustible
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $combustible =  Combustible::find($id);
        $combustible->nombre = $request->get('name');
        $combustible->save();    
        
        return redirect()->route('combustible.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Combustible  $combustible
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $combustible=Combustible::find($id);
        $combustible->delete();
        return redirect()->route('combustible.index');
    }
}
