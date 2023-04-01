<?php

namespace App\Http\Controllers;
use App\Models\Foto;
use App\Models\Historico;
use App\Models\Peritaje;
use App\Http\Requests\StoreHistoricoRequest;
use App\Http\Requests\UpdateHistoricoRequest;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peritajes = Peritaje::All();
        
        return view('historico.index',compact('peritajes'));
        
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
     * @param  \App\Http\Requests\StoreHistoricoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHistoricoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Historico  $historico
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$id=$request->get('peritajeid');
        $peritaje=Peritaje::find($id);
        $vehiculo=$peritaje->vehiculo;
        if (isset( $vehiculo)) {
            return view('vehiculo.index')->with(compact('vehiculo'));
           }else{
            $mensaje="Placa no Encontrada";
            return view('vehiculo.index')->with(compact('mensaje'));
           }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Historico  $historico
     * @return \Illuminate\Http\Response
     */
    public function edit(Historico $historico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHistoricoRequest  $request
     * @param  \App\Models\Historico  $historico
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHistoricoRequest $request, Historico $historico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Historico  $historico
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $peritaje=Peritaje::find($id);

        if(isset($peritaje->fotocontrol)){
        $fotocontrol_id=$peritaje->fotocontrol->id;
      
        $fotos=Foto::where('fotocontrol_id','=',$fotocontrol_id)->get();
        foreach($fotos as $foto){
            if(isset($foto->imagen)){
                if(file_exists("imagen/".$foto->imagen)){
               unlink("imagen/".$foto->imagen);
               }
               }

        }
    }
        $peritaje->delete();
        return redirect()->route('historico.index');
    }
}
