<?php

namespace App\Http\Controllers;

use App\Models\Paginadocontrol;
use App\Http\Requests\StorePaginadocontrolRequest;
use App\Http\Requests\UpdatePaginadocontrolRequest;
use App\Models\Peritaje;
use Illuminate\Http\Request;


class PaginadocontrolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePaginadocontrolRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePaginadocontrolRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paginadocontrol  $paginadocontrol
     * @return \Illuminate\Http\Response
     */
    public function show(Paginadocontrol $paginadocontrol)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paginadocontrol  $paginadocontrol
     * @return \Illuminate\Http\Response
     */
    public function edit(Paginadocontrol $paginadocontrol)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePaginadocontrolRequest  $request
     * @param  \App\Models\Paginadocontrol  $paginadocontrol
     * @return \Illuminate\Http\Response
     */
  

public function update(Request $request)
    {   $request->validate([
        'peritajeid'=>'required'
        
        

    ]);
         $id=$request->get('peritajeid');
        $peritaje=Peritaje::find($id);
        $paginadocontrol=$peritaje->paginadocontrol;
        $paginadocontrol->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('vehiculo.index')->with(compact('vehiculo'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paginadocontrol  $paginadocontrol
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paginadocontrol $paginadocontrol)
    {
        //
    }
    
}
