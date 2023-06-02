<?php

namespace App\Http\Controllers;

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
use PDF;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
       // $vehiculos=App\Models\Vehiculo::where('id','=',1)->get();
     //  return view('vehiculo.sistemaelectrico')->with('vehiculos', $vehiculos);
        //echo $vehiculos;
 //foreach ($vehiculos as $vehiculo) {
 //   echo $vehiculo->id;
//}
        
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipo_peritaje'=>'required',
            'tipo_vehiculo'=>'required',
            'solicitante'=>'required',
            'telefono'=>'required',
            'km'=>'required',
            'tipoidentificacion'=>'required',
            'numeroidentificacion'=>'required',
            'email'=>'required'
        ]);
        $peritaje = new Peritaje();
        $peritaje->tipo=$request->get('tipo_peritaje');
        $peritaje->fecha=date( 'Y-m-d' );
        $peritaje->save();
        
     $vehiculo = new Vehiculo();
     $vehiculo->placa=$request->get('placa');
     $vehiculo->clase_vehiculo=$request->get('tipo_vehiculo');
     $vehiculo->solicitante=$request->get('solicitante');
     $vehiculo->telefono=$request->get('telefono');
     $vehiculo->km=$request->get('km');
     $vehiculo->email=$request->get('email');
     $vehiculo->tipoidentificacion=$request->get('tipoidentificacion');
     $vehiculo->numeroidentificacion=$request->get('numeroidentificacion');
     $vehiculo->peritaje_id=$peritaje->id;
       $vehiculo->save();
       // return view('vehiculo.index')->with('vehiculo', $vehiculo);
      
       //return redirect('vehiculos')->with(compact('vehiculo'));
       return redirect( "/vehiculos?placa=$vehiculo->placa&vehiculoindex=1");
       /*  $vehiculos = new Vehiculo();
        $vehiculos->codigo = $request->get('codigo');
        $vehiculos->descripcion = $request->get('descripcion');
        $vehiculos->cantidad = $request->get('cantidad');
        $vehiculos->precio = $request->get('precio');
        $vehiculos->save(); //metodo guardar */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $placa=$request->get('placa');
        $vehiculoindex=$request->get('vehiculoindex');
        if($placa=="")
                 return view('vehiculo.index');
        if($placa!="" && $vehiculoindex=="1"){
            $vehiculo=Vehiculo::where('placa','=',$placa)->latest()->first();
     
       if (isset( $vehiculo)) {
        return view('vehiculo.index')->with(compact('vehiculo'));
       }else{
        $mensaje="Placa no Encontrada";
        return view('vehiculo.index')->with(compact('mensaje'));
       }
        }
                
         //forma de devolver todos los vehiculos con la placa
       /* $vehiculos=Vehiculo::where('placa','=',$placa)->get();
         foreach ($vehiculos as $vehiculo){
      $vehiculo= $vehiculo;
       }*/

       // nos devuelve el ultimo registro de esta placa
       $vehiculo=Vehiculo::where('placa','=',$placa)->latest()->first();
     
       if (isset( $vehiculo)&& $vehiculoindex=="2" ) {
       $peritaje=Peritaje::find($vehiculo->peritaje_id);
       if (isset($peritaje->electricocontrol)){
       $electricos=$peritaje->electricocontrol->piezaselectricas;
       $responsable=$peritaje->electricocontrol->user;
       $electricocontrol=$peritaje->electricocontrol;
       // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
       return view('vehiculo.sistemaelectrico')->with(compact('vehiculo','electricos','responsable','electricocontrol'));
       }else{
        return view('vehiculo.sistemaelectrico')->with(compact('vehiculo'));
    }
    }
       if (isset( $vehiculo)&& $vehiculoindex=="3" ) {
        $peritaje=Peritaje::find($vehiculo->peritaje_id);
        if (isset($peritaje->motorcontrol)){
            $motors=$peritaje->motorcontrol->piezasmotors;
            $responsable=$peritaje->motorcontrol->user;
            $motorcontrol=$peritaje->motorcontrol;
            return view('vehiculo.motor')->with(compact('vehiculo','motors','responsable','motorcontrol'));
        }else{
            return view('vehiculo.motor')->with(compact('vehiculo'));
        }
        
        // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
       
        }
        if (isset($vehiculo) && $vehiculoindex=="4" ) {
            $peritaje=Peritaje::find($vehiculo->peritaje_id);
            if (isset($peritaje->exteriorcontrol)){
            $exteriores=$peritaje->exteriorcontrol->piezasexteriores;
            $responsable=$peritaje->exteriorcontrol->user;
            $exteriorcontrol=$peritaje->exteriorcontrol;
            // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
            return view('vehiculo.exterior')->with(compact('vehiculo','exteriores','responsable','exteriorcontrol'));
            }else{
                return view('vehiculo.exterior')->with(compact('vehiculo'));
        }
    }

    if (isset($vehiculo) && $vehiculoindex=="5" ) {
        $peritaje=Peritaje::find($vehiculo->peritaje_id);
        if (isset($peritaje->fluidocontrol)){
        $fluidos=$peritaje->fluidocontrol->fluidoparts;
        $responsable=$peritaje->fluidocontrol->user;
        $fluidocontrol=$peritaje->fluidocontrol;
       // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
        return view('vehiculo.fluido')->with(compact('vehiculo','fluidos','responsable','fluidocontrol'));
        }else{
            return view('vehiculo.fluido')->with(compact('vehiculo'));
    }
}
if (isset($vehiculo) && $vehiculoindex=="6" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->llantacontrol)){
    $llantas=$peritaje->llantacontrol->llantaparts;
    $responsable=$peritaje->llantacontrol->user;
    $llantacontrol=$peritaje->llantacontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.llanta')->with(compact('vehiculo','llantas','responsable','llantacontrol'));
    }else{
        return view('vehiculo.llanta')->with(compact('vehiculo'));
}
}
if (isset($vehiculo) && $vehiculoindex=="7" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->suspensioncontrol)){
    $suspensions=$peritaje->suspensioncontrol->suspensionparts;
    $responsable=$peritaje->suspensioncontrol->user;
    $suspensioncontrol=$peritaje->suspensioncontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.suspension')->with(compact('vehiculo','suspensions','responsable','suspensioncontrol'));
    }else{
        return view('vehiculo.suspension')->with(compact('vehiculo'));
}
}

if (isset($vehiculo) && $vehiculoindex=="sm" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->suspensioncontrol)){
    $suspensions=$peritaje->suspensioncontrol->suspensionparts;
    $responsable=$peritaje->suspensioncontrol->user;
    $suspensioncontrol=$peritaje->suspensioncontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.suspensionmecanizada')->with(compact('vehiculo','suspensions','responsable','suspensioncontrol'));
    }else{
        return view('vehiculo.suspensionmecanizada')->with(compact('vehiculo'));
}
}



if (isset($vehiculo) && $vehiculoindex=="8" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->compresioncontrol)){
  
    $compresions=$peritaje->compresioncontrol->compresionparts;
    $responsable=$peritaje->compresioncontrol->user;
    $compresioncontrol=$peritaje->compresioncontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.compresion')->with(compact('vehiculo','compresions','responsable','compresioncontrol'));
    }else{
        return view('vehiculo.compresion')->with(compact('vehiculo'));
}
}
if (isset($vehiculo) && $vehiculoindex=="9" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->luzcontrol)){
    
    $luzs=$peritaje->luzcontrol->luzparts;
    $responsable=$peritaje->luzcontrol->user;
   $luzcontrol= $peritaje->luzcontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.luz')->with(compact('vehiculo','luzs','responsable','luzcontrol'));
    }else{
        return view('vehiculo.luz')->with(compact('vehiculo'));
}
}


if (isset($vehiculo) && $vehiculoindex=="10" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->frenocontrol)){
    
    $frenos=$peritaje->frenocontrol->frenoparts;
    $responsable=$peritaje->frenocontrol->user;
    $frenocontrol= $peritaje->frenocontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.freno')->with(compact('vehiculo','frenos','responsable','frenocontrol'));
    }else{
        return view('vehiculo.freno')->with(compact('vehiculo'));
}
}
if (isset($vehiculo) && $vehiculoindex=="11" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->fotocontrol)){
    
    $fotos=$peritaje->fotocontrol->fotoparts;
    $responsable=$peritaje->fotocontrol->user;
    $fotocontrol=$peritaje->fotocontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.foto')->with(compact('vehiculo','fotos','responsable','fotocontrol'));
    }else{
        return view('vehiculo.foto')->with(compact('vehiculo'));
}
}

if (isset($vehiculo) && $vehiculoindex=="chasis" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->chasiscontrol)){
    
    $chasiss=$peritaje->chasiscontrol->chasisparts;
    $responsable=$peritaje->chasiscontrol->user;
    $chasiscontrol=$peritaje->chasiscontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.chasis')->with(compact('vehiculo','chasiss','responsable','chasiscontrol'));
    }else{
        return view('vehiculo.chasis')->with(compact('vehiculo'));
}
}
if (isset($vehiculo) && $vehiculoindex=="estructura" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->estructuracontrol)){
    
    $estructuras=$peritaje->estructuracontrol->estructuraparts;
    $responsable=$peritaje->estructuracontrol->user;
    $estructuracontrol=$peritaje->estructuracontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.estructura')->with(compact('vehiculo','estructuras','responsable','estructuracontrol'));
    }else{
        return view('vehiculo.estructura')->with(compact('vehiculo'));
}
}
if (isset($vehiculo) && $vehiculoindex=="interior" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->interiorcontrol)){
    
    $interiors=$peritaje->interiorcontrol->interiorparts;
    $responsable=$peritaje->interiorcontrol->user;
    $interiorcontrol=$peritaje->interiorcontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.interior')->with(compact('vehiculo','interiors','responsable','interiorcontrol'));
    }else{
        return view('vehiculo.interior')->with(compact('vehiculo'));
}
}
if (isset($vehiculo) && $vehiculoindex=="baja" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->bajacontrol)){
    
    $bajas=$peritaje->bajacontrol->bajaparts;
    $responsable=$peritaje->bajacontrol->user;
    $bajacontrol=$peritaje->bajacontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.baja')->with(compact('vehiculo','bajas','responsable','bajacontrol'));
    }else{
        return view('vehiculo.baja')->with(compact('vehiculo'));
}
}
if (isset($vehiculo) && $vehiculoindex=="equipo" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->equipocontrol)){
    
    $equipos=$peritaje->equipocontrol->equipoparts;
    $responsable=$peritaje->equipocontrol->user;
    $equipocontrol=$peritaje->equipocontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.equipo')->with(compact('vehiculo','equipos','responsable','equipocontrol'));
    }else{
        return view('vehiculo.equipo')->with(compact('vehiculo'));
}
}
if (isset($vehiculo) && $vehiculoindex=="sw" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->swcontrol)){
    
    $sws=$peritaje->swcontrol->swparts;
    $responsable=$peritaje->swcontrol->user;
    $swcontrol=$peritaje->swcontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.sw')->with(compact('vehiculo','sws','responsable','swcontrol'));
    }else{
        return view('vehiculo.sw')->with(compact('vehiculo'));
}
}


if (isset($vehiculo) && $vehiculoindex=="archivo" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->archivocontrol)){
    $archivos=$peritaje->archivocontrol->archivoparts;
    
    $responsable=$peritaje->archivocontrol->user;
    $archivocontrol=$peritaje->archivocontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.archivo')->with(compact('vehiculo','responsable','archivocontrol','archivos'));
    }else{
        return view('vehiculo.archivo')->with(compact('vehiculo'));
}
}


if (isset($vehiculo) && $vehiculoindex=="latoneria" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->latoneriacontrol)){
    
    $latonerias=$peritaje->latoneriacontrol->latoneriaparts;
    $responsable=$peritaje->latoneriacontrol->user;
    $latoneriacontrol=$peritaje->latoneriacontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.latoneria')->with(compact('vehiculo','latonerias','responsable','latoneriacontrol'));
    }else{
        return view('vehiculo.latoneria')->with(compact('vehiculo'));
}
}

if (isset($vehiculo) && $vehiculoindex=="pintura" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->pinturacontrol)){
    
    $pinturas=$peritaje->pinturacontrol->latoneriaparts;
    $responsable=$peritaje->pinturacontrol->user;
    $pinturacontrol=$peritaje->pinturacontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.pintura')->with(compact('vehiculo','pinturas','responsable','pinturacontrol'));
    }else{
        return view('vehiculo.pintura')->with(compact('vehiculo'));
}
}

if (isset($vehiculo) && $vehiculoindex=="vluces" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->vlucescontrol)){
    
    $vlucess=$peritaje->vlucescontrol->luzparts;
    $responsable=$peritaje->vlucescontrol->user;
    $vlucescontrol=$peritaje->vlucescontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.vluces')->with(compact('vehiculo','vlucess','responsable','vlucescontrol'));
    }else{
        return view('vehiculo.vluces')->with(compact('vehiculo'));
}
}
if (isset($vehiculo) && $vehiculoindex=="nfluido" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->nfluidocontrol)){
    
    $nfluidos=$peritaje->nfluidocontrol->fluidoparts;
    $responsable=$peritaje->nfluidocontrol->user;
    $nfluidocontrol=$peritaje->nfluidocontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.nfluido')->with(compact('vehiculo','nfluidos','responsable','nfluidocontrol'));
    }else{
        return view('vehiculo.nfluido')->with(compact('vehiculo'));
}
}

if (isset($vehiculo) && $vehiculoindex=="escaner" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->escanercontrol)){
    $responsable=$peritaje->escanercontrol->user; 
     $escanercontrol=$peritaje->escanercontrol;
     $escaners=$escanercontrol->escanerparts;
    return view('vehiculo.escaner')->with(compact('vehiculo','responsable','escanercontrol','escaners')); 
    }else{
        return view('vehiculo.escaner')->with(compact('vehiculo'));
}
}

if (isset($vehiculo) && $vehiculoindex=="paginado" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->paginadocontrol)){
      
     $paginadocontrol=$peritaje->paginadocontrol;
     $paginados=$paginadocontrol->paginadoparts;
    return view('vehiculo.paginado')->with(compact('vehiculo','paginadocontrol','paginados')); 
    }else{
        return view('vehiculo.paginado')->with(compact('vehiculo'));
}
}





if (isset($vehiculo) && $vehiculoindex=="vidrio" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
    if (isset($peritaje->vidriocontrol)){
    
    $vidrios=$peritaje->vidriocontrol->vidrioparts;
    $responsable=$peritaje->vidriocontrol->user;
    $vidriocontrol=$peritaje->vidriocontrol;
   // return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
    return view('vehiculo.vidrio')->with(compact('vehiculo','vidrios','responsable','vidriocontrol'));
    }else{
        return view('vehiculo.vidrio')->with(compact('vehiculo'));
}
}









if (isset($vehiculo) && $vehiculoindex=="12" ) {
    $peritaje=Peritaje::find($vehiculo->peritaje_id);
   
   $data = [
    'title' => 'PERITAJE',
    'date' => date('m/d/Y'),
    'peritaje' => $peritaje
]; 
    $fecha=date('m/d/Y');
   $nombre=$vehiculo->placa.".pdf";

   if($vehiculo->clase_vehiculo=="Motocicleta"){
    if($peritaje->tipo=="BÁSICO"){
        
       // return view('vehiculo.firma.documento')->with('vehiculo',$vehiculo);
       return view('vehiculo.firma.informemotobasico')->with(compact('vehiculo','peritaje'));
        
    }
  }
  if($vehiculo->clase_vehiculo=="Automóvil"){
    if($peritaje->tipo=="BÁSICO"){
        
       // return view('vehiculo.firma.documento')->with('vehiculo',$vehiculo);
       return view('vehiculo.firma.informeautomovilbasico')->with(compact('vehiculo','peritaje'));
        
    }
  }



//$pdf = PDF::loadView('vehiculo.myPDFDOS', $data);
 /*   if($vehiculo->clase_vehiculo=="Motocicleta"){
        if($peritaje->tipo=="BÁSICO"){
            $pdf = PDF::loadView('vehiculo.myPDFBM', $data);
            $pdf->setPaper('legal', 'portrait');
            return $pdf->stream($nombre);
        } else{
        $pdf = PDF::loadView('vehiculo.myPDFDOS', $data);
        $pdf->setPaper('legal', 'portrait');
        return $pdf->stream($nombre);
        }

}
*/
//$pdf = PDF::loadView('vehiculo.myPDF', $data);

$pdf = PDF::loadView('vehiculo.myPDFDOS', $data);

$pdf->setPaper('legal', 'portrait');
 
// return $pdf->download('peritaje.pdf');
return $pdf->stream($nombre); 
   
  //  return view('vehiculo.myPDF')->with($data,'data');
  //  }else{
  //      return view('vehiculo.foto')->with(compact('vehiculo'));
  //}
}
       

     if (isset($vehiculo) && $vehiculoindex=="firma" ) {
         
        return view('vehiculo.firma.index')->with(compact('vehiculo')); 
        }else{
            return view('vehiculo.index')->with(compact('vehiculo'));
    }

    
    



   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculo=Vehiculo::find($id);
        return view('vehiculo.edit')->with(compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_peritaje'=>'required',
            'tipo_vehiculo'=>'required',
            'solicitante'=>'required',
            'telefono'=>'required',
            'km'=>'required',
            'tipoidentificacion'=>'required',
            'numeroidentificacion'=>'required',
            'email'=>'required']);
     
       $vehiculo=Vehiculo::find($id);
       $peritaje=Peritaje::find($vehiculo->peritaje->id);
       $peritaje->tipo=$request->get('tipo_peritaje');
       $peritaje->save();
       //$vehiculo->placa=$request->get('placa');
       $vehiculo->clase_vehiculo=$request->get('tipo_vehiculo');
       $vehiculo->solicitante=$request->get('solicitante');
       $vehiculo->tipoidentificacion=$request->get('tipoidentificacion');
       $vehiculo->numeroidentificacion=$request->get('numeroidentificacion');
       $vehiculo->telefono=$request->get('telefono');
       $vehiculo->email=$request->get('email');
       $vehiculo->km=$request->get('km');
       $vehiculo->activo=0;
       $vehiculo->save();
       return redirect( "/vehiculos?placa=$vehiculo->placa&vehiculoindex=1");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function cvehiculo()
    {
        $marcas = Marca::All();
        $colors = Color::All();
        $servicios=Servicio::All();
        $transmisiones=Transmision::All();
        $carrocerias=Carroceria::All();
        $combustibles=Combustible::All();
       // return view('vehiculo.moto')->with('marcas', $marcas);
       return view('vehiculo.create')->with(compact('marcas','colors','servicios','transmisiones','carrocerias','combustibles'));
       
    }
    public function lineas($id)
    {
        $marca=Marca::find($id);
        return $marca->lineas;
    }
    public function sistemaelectrico()
    {
      /*  $vehiculo=DB::table('vehiculos')
        ->where('placa', '=', $request->get('placa'))
        
        ->get();
        return view('vehiculo.sistemaelectrico')->with('vehiculo', $vehiculo);
   */
    }
    public function consulta($id)
    {
        $vehiculo=Vehiculo::find($id);
        if(isset($vehiculo)){
        return view('vehiculo.vindex')->with('vehiculo', $vehiculo);
        }   
        else{
            return view('vehiculo.index');
        }}


        public function activar($id)
    {
        $vehiculo=Vehiculo::find($id);
        $vehiculo->activo=1;
        $vehiculo->save(); 
     
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }
    public function inactiva($id)
    {
        $vehiculo=Vehiculo::find($id);
        $vehiculo->activo=0;
        $vehiculo->save(); 
        return view('superadmin.activar.index')->with(compact('vehiculo'));

    }

}
