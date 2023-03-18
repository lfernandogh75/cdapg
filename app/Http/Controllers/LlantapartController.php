<?php

namespace App\Http\Controllers;

use App\Models\Llantapart;
use App\Http\Requests\StoreLlantapartRequest;
use App\Http\Requests\UpdateLlantapartRequest;
use Illuminate\Http\Request;

class LlantapartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $llantaparts = Llantapart::paginate(5);
        
        return view('vehiculo.llantapart.index',compact('llantaparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.llantapart.create');
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
      $llantapart = new Llantapart();
        $llantapart->name=$request->get('name');
         
        $llantapart->save();
        return redirect()->route('llantapart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Llantapart  $llantapart
     * @return \Illuminate\Http\Response
     */
    public function show(Llantapart $llantapart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Llantapart  $llantapart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $llantapart = Llantapart::find($id);
        return view('vehiculo/llantapart.edit')->with('llantapart',$llantapart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Llantapart  $llantapart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $llantapart =  Llantapart::find($id);
        $llantapart->name = $request->get('name');
        $llantapart->save();    
        
        return redirect()->route('llantapart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Llantapart  $llantapart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $llantapart=Llantapart::find($id);
        $llantapart->delete();
        return redirect()->route('llantapart.index');
    }
}

     