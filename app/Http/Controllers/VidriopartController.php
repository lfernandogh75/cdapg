<?php

namespace App\Http\Controllers;

use App\Models\Vidriopart;
use App\Http\Requests\StoreVidriopartRequest;
use App\Http\Requests\UpdateVidriopartRequest;
use Illuminate\Http\Request;

class VidriopartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vidrioparts = Vidriopart::paginate(5);
        
        return view('vehiculo.vidriopart.index',compact('vidrioparts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehiculo.vidriopart.create');
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
      $vidriopart = new Vidriopart();
        $vidriopart->name=$request->get('name');
         
        $vidriopart->save();
        return redirect()->route('vidriopart.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vidriopart  $vidriopart
     * @return \Illuminate\Http\Response
     */
    public function show(Vidriopart $vidriopart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vidriopart  $vidriopart
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vidriopart = Vidriopart::find($id);
        return view('vehiculo/vidriopart.edit')->with('vidriopart',$vidriopart);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vidriopart  $vidriopart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $vidriopart =  Vidriopart::find($id);
        $vidriopart->name = $request->get('name');
        $vidriopart->save();    
        
        return redirect()->route('vidriopart.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vidriopart  $vidriopart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vidriopart=Vidriopart::find($id);
        $vidriopart->delete();
        return redirect()->route('vidriopart.index');
    }
}

     