<?php

namespace App\Http\Controllers;

use App\Models\Tarjeta;
use App\Http\Requests\StoreTarjetaRequest;
use App\Http\Requests\UpdateTarjetaRequest;
use Illuminate\Http\Request;
use App\Models\Marca;
use App\Models\Linea;
use App\Models\Color;
use App\Models\Servicio;
use App\Models\Transmision;
use App\Models\Carroceria;
use App\Models\Combustible;
use App\Models\Vehiculo;
use App\Models\Peritaje;
use Illuminate\Support\Facades\Auth;

class TarjetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
         
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
     * @param  \App\Http\Requests\StoreTarjetaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$peritaje = new Peritaje();
       // $peritaje->tipo=$request->get('tipo_peritaje');
        //$peritaje->fecha=date( 'Y-m-d' );
        //$peritaje->save();
        $user=Auth::user();
       
        $peritaje_id=$request->get('peritaje_id');
        $peritaje =Peritaje::find( $peritaje_id);
        //$tarjeta = new Tarjeta();
       
        $marca = Marca::find($request->get('select-marca'));
        $linea = Linea::find($request->get('select-linea'));
        $color = Color::find($request->get('select-color'));
        $servicio = Servicio::find($request->get('select-servicio'));
        $transmision = Transmision::find($request->get('select-transmision'));
        $carroceria = Carroceria::find($request->get('select-carroceria'));
        $combustible = Combustible::find($request->get('select-combustible'));
        $tarjeta= new Tarjeta();
        $tarjeta->user_id=$user->id;
        $tarjeta->placa=$peritaje->vehiculo->placa;
        $tarjeta->marca_id = $marca->id;
        $tarjeta->linea_id = $linea->id;
        $tarjeta->clase_vehiculo=$peritaje->vehiculo->clase_vehiculo;
        $tarjeta->transmision_id = $transmision->id;
        $tarjeta->carroceria_id = $carroceria->id;
        $tarjeta->combustible_id = $combustible->id;
        $tarjeta->color_id = $color->id;
        $tarjeta->servicio_id = $servicio->id;
       $tarjeta->modelo=$request->get('modelo');
       $tarjeta->cilindrada=$request->get('cilindrada');
       $tarjeta->capacidad=$request->get('capacidad');
       $tarjeta->numero_motor=$request->get('motor');
       $tarjeta->numero_serie=$request->get('serie');
       $tarjeta->numero_vin=$request->get('vin');
       $tarjeta->numero_chasis=$request->get('chasis');
       $tarjeta->nacionalidad=$request->get('nacionalidad');
       $tarjeta->potencia=$request->get('potencia');
       $tarjeta->fecha_matricula=$request->get('fecha_matricula');
       $tarjeta->propietario=$request->get('propietario');
       $tarjeta->identificacion_propietario=$request->get('identificacion_propietario');
       $tarjeta->licencia=$request->get('licencia');
       $tarjeta->matriculado=$request->get('matriculado');
       $tarjeta->peritaje_id=$peritaje->id;
       $tarjeta->activo=0;
       $tarjeta->save();
       
       return redirect( "/vehiculos?placa=$tarjeta->placa&vehiculoindex=1");
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $tarjeta=Tarjeta::find($id);
      return view('vehiculo.tarjeta.index')->with(compact('tarjeta'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $tarjeta=Tarjeta::find($id);
        $marcas = Marca::All();
        $colors = Color::All();
        $servicios=Servicio::All();
        $transmisiones=Transmision::All();
        $carrocerias=Carroceria::All();
        $combustibles=Combustible::All();
       // $vehiculo=Vehiculo::find($tarjeta->peritaje_id);
       // return view('vehiculo.moto')->with('marcas', $marcas);
       return view('vehiculo.tarjeta.edit')->with(compact('marcas','colors','servicios','transmisiones','carrocerias','combustibles','tarjeta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTarjetaRequest  $request
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        $marca = Marca::find($request->get('select-marca'));
        $linea = Linea::find($request->get('select-linea'));
        $color = Color::find($request->get('select-color'));
        $servicio = Servicio::find($request->get('select-servicio'));
        $transmision = Transmision::find($request->get('select-transmision'));
        $carroceria = Carroceria::find($request->get('select-carroceria'));
        $combustible = Combustible::find($request->get('select-combustible'));
        $tarjeta=Tarjeta::find($id);
        $tarjeta->marca_id = $marca->id;
        $tarjeta->linea_id = $linea->id;
        $tarjeta->transmision_id = $transmision->id;
        $tarjeta->carroceria_id = $carroceria->id;
        $tarjeta->combustible_id = $combustible->id;
        $tarjeta->color_id = $color->id;
        $tarjeta->servicio_id = $servicio->id;
       $tarjeta->modelo=$request->get('modelo');
       $tarjeta->cilindrada=$request->get('cilindrada');
       $tarjeta->capacidad=$request->get('capacidad');
       $tarjeta->numero_motor=$request->get('motor');
       $tarjeta->numero_serie=$request->get('serie');
       $tarjeta->numero_vin=$request->get('vin');
       $tarjeta->numero_chasis=$request->get('chasis');
       $tarjeta->nacionalidad=$request->get('nacionalidad');
       $tarjeta->potencia=$request->get('potencia');
       $tarjeta->fecha_matricula=$request->get('fecha_matricula');
       $tarjeta->propietario=$request->get('propietario');
       $tarjeta->licencia=$request->get('licencia');
       $tarjeta->matriculado=$request->get('matriculado');
       $tarjeta->identificacion_propietario=$request->get('identificacion_propietario');
       $tarjeta->activo=0;
       $tarjeta->save();
       
       return redirect( "/vehiculos?placa=$tarjeta->placa&vehiculoindex=1");
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarjeta  $tarjeta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarjeta $tarjeta)
    {
        //
    }
    public function ctarjeta(Request $request)
    {
        $placa=$request->get('placa');
        if($placa=="")
                 return view('vehiculo.index');
        else{
            $vehiculo=Vehiculo::where('placa','=',$placa)->latest()->first();
        

        $marcas = Marca::All();
        $colors = Color::All();
        $servicios=Servicio::All();
        $transmisiones=Transmision::All();
        $carrocerias=Carroceria::All();
        $combustibles=Combustible::All();
       // return view('vehiculo.moto')->with('marcas', $marcas);
       return view('vehiculo.tarjeta.create')->with(compact('marcas','colors','servicios','transmisiones','carrocerias','combustibles','vehiculo'));
       }
    }
    public function activar($id)
    {
        $peritaje=Peritaje::find($id);
        $tarjeta=$peritaje->tarjeta;
        $tarjeta->activo=1;
        $tarjeta->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $peritaje=Peritaje::find($id);
        $tarjeta=$peritaje->tarjeta;
        $tarjeta->activo=0;
        $tarjeta->save(); 
        $vehiculo=$peritaje->vehiculo;
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
}
