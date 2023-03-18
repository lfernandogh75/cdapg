<?php

namespace App\Http\Controllers;

use App\Models\Motorpark;
use App\Http\Requests\StoreMotorparkRequest;
use App\Http\Requests\UpdateMotorparkRequest;
use Illuminate\Http\Request;

class MotorparkController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motorparks = Motorpark::paginate(5);
        
        return view('vehiculo.motorpark.index',compact('motorparks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.motorpark.create');
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
      $motorpark = new Motorpark();
        $motorpark->name=$request->get('name');
         
        $motorpark->save();
        return redirect()->route('motorpark.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Motorpark  $motorpark
     * @return \Illuminate\Http\Response
     */
    public function show(Motorpark $motorpark)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Motorpark  $motorpark
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $motorpark = Motorpark::find($id);
        return view('vehiculo/motorpark.edit')->with('motorpark',$motorpark);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Motorpark  $motorpark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $motorpark =  Motorpark::find($id);
        $motorpark->name = $request->get('name');
        $motorpark->save();    
        
        return redirect()->route('motorpark.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Motorpark  $motorpark
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $motorpark=Motorpark::find($id);
        $motorpark->delete();
        return redirect()->route('motorpark.index');
    }
}
