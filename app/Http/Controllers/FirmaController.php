<?php

namespace App\Http\Controllers;

use App\Models\Firma;
use App\Models\Peritaje;
use App\Http\Requests\StoreFirmaRequest;
use App\Http\Requests\UpdateFirmaRequest;
use App\Models\Vehiculo;

class FirmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $vehiculo=Vehiculo::find($id);
        $peritaje=Peritaje::find( $vehiculo->peritaje_id);
       // return view('vehiculo.firma.documento')->with('vehiculo',$vehiculo);
       return view('vehiculo.firma.documento')->with(compact('vehiculo','peritaje'));
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
     * @param  \App\Http\Requests\StoreFirmaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFirmaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function show(Firma $firma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function edit(Firma $firma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFirmaRequest  $request
     * @param  \App\Models\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFirmaRequest $request, Firma $firma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Firma  $firma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firma $firma)
    {
        //
    }
}
