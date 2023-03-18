<?php

namespace App\Http\Controllers;
use App\Models\Fluido;
use App\Models\Fluidopart;
use App\Http\Requests\StoreFluidopartRequest;
use App\Http\Requests\UpdateFluidopartRequest;
use Illuminate\Http\Request;

class FluidopartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fluidoparts = Fluidopart::paginate(5);
        
        return view('vehiculo.fluidopart.index',compact('fluidoparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.fluidopart.create');
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
      $fluidopart = new Fluidopart();
        $fluidopart->name=$request->get('name');
         
        $fluidopart->save();
        return redirect()->route('fluidopart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fluidopart  $fluidopart
     * @return \Illuminate\Http\Response
     */
    public function show(Fluidopart $fluidopart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fluidopart  $fluidopart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fluidopart = Fluidopart::find($id);
        return view('vehiculo/fluidopart.edit')->with('fluidopart',$fluidopart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fluidopart  $fluidopart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fluidopart =  Fluidopart::find($id);
        $fluidopart->name = $request->get('name');
        $fluidopart->save();    
        
        return redirect()->route('fluidopart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fluidopart  $fluidopart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fluidopart=Fluidopart::find($id);
        $fluidopart->delete();
        return redirect()->route('fluidopart.index');
    }
}
