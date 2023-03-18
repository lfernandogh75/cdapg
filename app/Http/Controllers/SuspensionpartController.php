<?php

namespace App\Http\Controllers;

use App\Models\Suspensionpart;
use App\Http\Requests\StoreSuspensionpartRequest;
use App\Http\Requests\UpdateSuspensionpartRequest;
use Illuminate\Http\Request;

class SuspensionpartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suspensionparts = Suspensionpart::paginate(5);
        
        return view('vehiculo.suspensionpart.index',compact('suspensionparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.suspensionpart.create');
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
      $suspensionpart = new Suspensionpart();
        $suspensionpart->name=$request->get('name');
         
        $suspensionpart->save();
        return redirect()->route('suspensionpart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suspensionpart  $suspensionpart
     * @return \Illuminate\Http\Response
     */
    public function show(Suspensionpart $suspensionpart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suspensionpart  $suspensionpart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $suspensionpart = Suspensionpart::find($id);
        return view('vehiculo/suspensionpart.edit')->with('suspensionpart',$suspensionpart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Suspensionpart  $suspensionpart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $suspensionpart =  Suspensionpart::find($id);
        $suspensionpart->name = $request->get('name');
        $suspensionpart->save();    
        
        return redirect()->route('suspensionpart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suspensionpart  $suspensionpart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $suspensionpart=Suspensionpart::find($id);
        $suspensionpart->delete();
        return redirect()->route('suspensionpart.index');
    }
}

     