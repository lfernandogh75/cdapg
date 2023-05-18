<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\LineaController;
use App\Http\Controllers\CombustibleController;
use App\Http\Controllers\CarroceriaController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\ElectricalpartController;
use App\Http\Controllers\MotorparkController;
use App\Http\Controllers\ExteriorpartController;
use App\Http\Controllers\FluidopartController;
use App\Http\Controllers\LlantapartController;
use App\Http\Controllers\SuspensionpartController;
use App\Http\Controllers\CompresionpartController;
use App\Http\Controllers\LuzpartController;
use App\Http\Controllers\FrenopartController;
use App\Http\Controllers\FotopartController;
use App\Http\Controllers\ChasispartController;
use App\Http\Controllers\EstructurapartController;
use App\Http\Controllers\InteriorpartController;
use App\Http\Controllers\LatoneriapartController;
use App\Http\Controllers\VidriopartController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ActivarController;
use App\Http\Controllers\TarjetaController;
use App\Http\Controllers\BajapartController;
use App\Http\Controllers\EquipopartController;
use App\Http\Controllers\SwpartController;
use App\Http\Controllers\FpdfController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\HistoricoController;


Route::get('/', function () {
   
    //codigo para el manejo de rol
  /*  $user=Auth::user();   
   if($user!=null) {
    if($user->superadmin()){
        echo "usuario super administrador";
    }
    else{
        echo 'usuario sin definir';
    }} */
    
    
    return view('welcome');
});

route::get('descarga/{id?}', 'App\Http\Controllers\ArchivoController@descarga');









Route::get('ejemploFecha', function () {
    return view('pruebas.fecha');
});

Route::get('fpdf', [FpdfController::class, 'index']);

Route::get('firma', function () {
    return view('vehiculo.firma.index');
});
/*Route::get('firmardocumento/{id?}', function () {
    
    return view('vehiculo.firma.guardarfirma');
});*/
Route::get('documento.html/{id?}','App\Http\Controllers\FirmaController@index');
Route::get('inspeccion/{id?}','App\Http\Controllers\Inspeccion@index');
 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('peritaje', function () {
        return view('peritaje.index');
    });
});

    route::get('/vehiculos/{placa?}', 'App\Http\Controllers\VehiculoController@show');
    route::get('/historicos/{peritajeid?}', 'App\Http\Controllers\HistoricoController@show');
    route::get('/consulta/{id}', 'App\Http\Controllers\VehiculoController@consulta');
   
    Route::get('sistemaelectrico', function () {
        return view('vehiculo.sistemaelectrico');
      //ejemplo mostrar todos los datos
       /* $vehiculos=App\Models\Vehiculo::all();
       foreach ($vehiculos as $vehiculo) {
        echo $vehiculo->id;
    }*/
    
    });

Route::get('inicio','App\Http\Controllers\InicioController@index');

Route::resource('persona','App\Http\Controllers\PersonaController');
Route::resource('articulos','App\Http\Controllers\ArticuloController');
Route::resource('vehiculos','App\Http\Controllers\VehiculoController');
Route::resource('selectricos','App\Http\Controllers\ElectricoController');
Route::resource('smotors','App\Http\Controllers\MotorController');
Route::resource('sexteriors','App\Http\Controllers\ExteriorController');
Route::resource('sfluidos','App\Http\Controllers\FluidoController');
Route::resource('sllantas','App\Http\Controllers\LlantaController');
Route::resource('ssuspensions','App\Http\Controllers\SuspensionController');
Route::resource('scompresions','App\Http\Controllers\CompresionController');
Route::resource('sluzs','App\Http\Controllers\LuzController');
Route::resource('sfrenos','App\Http\Controllers\FrenoController');
Route::resource('sfotos','App\Http\Controllers\FotoController');
Route::resource('sarchivos','App\Http\Controllers\ArchivoController');
Route::resource('schasiss','App\Http\Controllers\ChasisController');
Route::resource('sestructuras','App\Http\Controllers\EstructuraController');
Route::resource('sinteriors','App\Http\Controllers\InteriorController');
Route::resource('sbajas','App\Http\Controllers\BajaController');
Route::resource('sequipos','App\Http\Controllers\EquipoController');
Route::resource('ssws','App\Http\Controllers\SwController');
Route::resource('slatonerias','App\Http\Controllers\LatoneriaController');
Route::resource('svidrios','App\Http\Controllers\VidrioController');
Route::resource('spinturas','App\Http\Controllers\PinturaController');
Route::resource('svlucess','App\Http\Controllers\VlucesController');
Route::resource('snfluidos','App\Http\Controllers\NfluidoController');
Route::resource('sescaners','App\Http\Controllers\EscanerController');


Route::group(['middleware' => ['superadmin']], function () {
Route::resource('/marca',MarcaController::class);
Route::resource('/linea',LineaController::class);
Route::resource('/combustible',CombustibleController::class);
Route::resource('/carroceria',CarroceriaController::class);
Route::resource('/color',ColorController::class);
Route::resource('/electricalpart',ElectricalpartController::class);
Route::resource('/motorpark',MotorparkController::class);
Route::resource('/exteriorpart',ExteriorpartController::class);
Route::resource('/fluidopart',FluidopartController::class);
Route::resource('/llantapart',LlantapartController::class);
Route::resource('/suspensionpart',SuspensionpartController::class);
Route::resource('/compresionpart',CompresionpartController::class);
Route::resource('/luzpart',LuzpartController::class);
Route::resource('/frenopart',FrenopartController::class);
Route::resource('/fotopart',FotopartController::class);
Route::resource('/chasispart',ChasispartController::class);
Route::resource('/bajapart',BajapartController::class);
Route::resource('/equipopart',EquipopartController::class);
Route::resource('/swpart',SwpartController::class);
Route::resource('/estructurapart',EstructurapartController::class);
Route::resource('/interiorpart',InteriorpartController::class);
Route::resource('/latoneriapart',LatoneriapartController::class);
Route::resource('/vidriopart',VidriopartController::class);
Route::resource('/empresa',EmpresaController::class);
Route::resource('/historico',HistoricoController::class);
});

Route::resource('tarjetas','App\Http\Controllers\TarjetaController');
Route::resource('cierres','App\Http\Controllers\CierreController');
Route::resource('hvehiculos','App\Http\Controllers\Hvehiculo');
Route::resource('emisiongass','App\Http\Controllers\EmisiongasController');
Route::resource('simetrias','App\Http\Controllers\SimetriaController');
Route::resource('fotocontrol','App\Http\Controllers\FotocontrolController');
Route::resource('archivocontrol','App\Http\Controllers\ArchivocontrolController');
Route::resource('exteriorcontrol','App\Http\Controllers\ExteriorcontrolController');
Route::resource('motorcontrol','App\Http\Controllers\MotorcontrolController');
Route::resource('fluidocontrol','App\Http\Controllers\FluidocontrolController');
Route::resource('llantacontrol','App\Http\Controllers\LlantacontrolController');
Route::resource('electricocontrol','App\Http\Controllers\ElectricocontrolController');
Route::resource('suspensioncontrol','App\Http\Controllers\SuspensioncontrolController');
Route::resource('chasiscontrol','App\Http\Controllers\ChasiscontrolController');
Route::resource('estructuracontrol','App\Http\Controllers\EstructuracontrolController');
Route::resource('interiorcontrol','App\Http\Controllers\InteriorcontrolController');
Route::resource('bajacontrol','App\Http\Controllers\BajacontrolController');
Route::resource('equipocontrol','App\Http\Controllers\EquipocontrolController');
Route::resource('swcontrol','App\Http\Controllers\SwcontrolController');
Route::resource('latoneriacontrol','App\Http\Controllers\LatoneriacontrolController');
Route::resource('pinturacontrol','App\Http\Controllers\PinturacontrolController');
Route::resource('vidriocontrol','App\Http\Controllers\VidriocontrolController');
Route::resource('vlucescontrol','App\Http\Controllers\VlucescontrolController');
Route::resource('nfluidocontrol','App\Http\Controllers\NfluidocontrolController');
Route::resource('compresioncontrol','App\Http\Controllers\CompresioncontrolController');
Route::resource('luzcontrol','App\Http\Controllers\LuzcontrolController');
Route::resource('frenocontrol','App\Http\Controllers\FrenocontrolController');
Route::resource('escanercontrol','App\Http\Controllers\EscanercontrolController');

//Route::get('generate-pdf', [PDFController::class, 'generatePDF']); 

 
Route::get('cvehiculo','App\Http\Controllers\VehiculoController@cvehiculo');
 
Route::get('ctarjeta','App\Http\Controllers\TarjetaController@ctarjeta');
Route::get('ccierre','App\Http\Controllers\CierreController@ccierre');
Route::get('cemisiongas','App\Http\Controllers\EmisiongasController@cemisiongas');
Route::get('csimetria','App\Http\Controllers\SimetriaController@csimetria');
//});

/*Route::get('inicio', function () {
    return view('inicio');
});*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::resource('/productos',ProductoController::class);
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    


//Route::get('/superadmin','App\Http\Controllers\SuperadminController@index');
Route::resource('/superadmin',SuperadminController::class);
Route::resource('activar',ActivarController::class);



});

Route::group(['middleware' => ['superadmin']], function () {


    
    route::get('swactivar/{id?}', 'App\Http\Controllers\SwcontrolController@activar');
    route::get('swinactiva/{id?}', 'App\Http\Controllers\SwcontrolController@inactiva');
    route::get('tarjetaactivar/{id?}', 'App\Http\Controllers\TarjetaController@activar');
    route::get('tarjetainactiva/{id?}', 'App\Http\Controllers\TarjetaController@inactiva');
    route::get('emisiongasactivar/{id?}', 'App\Http\Controllers\EmisiongasController@activar');
    route::get('emisiongasinactiva/{id?}', 'App\Http\Controllers\EmisiongasController@inactiva');
    route::get('simetriaactivar/{id?}', 'App\Http\Controllers\SimetriaController@activar');
    route::get('simetriainactiva/{id?}', 'App\Http\Controllers\SimetriaController@inactiva');
    
    route::get('fotoactivar/{id?}', 'App\Http\Controllers\FotocontrolController@activar');
    route::get('fotoinactiva/{id?}', 'App\Http\Controllers\FotocontrolController@inactiva');
    route::get('exterioractivar/{id?}', 'App\Http\Controllers\ExteriorcontrolController@activar');
    route::get('exteriorinactiva/{id?}', 'App\Http\Controllers\ExteriorcontrolController@inactiva');
    route::get('motoractivar/{id?}', 'App\Http\Controllers\MotorcontrolController@activar');
    route::get('motorinactiva/{id?}', 'App\Http\Controllers\MotorcontrolController@inactiva');
    route::get('fluidoactivar/{id?}', 'App\Http\Controllers\FluidocontrolController@activar');
    route::get('fluidoinactiva/{id?}', 'App\Http\Controllers\FluidocontrolController@inactiva');
    route::get('llantaactivar/{id?}', 'App\Http\Controllers\llantacontrolController@activar');
    route::get('llantainactiva/{id?}', 'App\Http\Controllers\llantacontrolController@inactiva');
    route::get('electricoactivar/{id?}', 'App\Http\Controllers\ElectricocontrolController@activar');
    route::get('electricoinactiva/{id?}', 'App\Http\Controllers\ElectricocontrolController@inactiva');
    route::get('suspensionactivar/{id?}', 'App\Http\Controllers\SuspensioncontrolController@activar');
    route::get('suspensioninactiva/{id?}', 'App\Http\Controllers\SuspensioncontrolController@inactiva');
    route::get('chasisactivar/{id?}', 'App\Http\Controllers\ChasiscontrolController@activar');
    route::get('chasisinactiva/{id?}', 'App\Http\Controllers\ChasiscontrolController@inactiva');
    route::get('estructuraactivar/{id?}', 'App\Http\Controllers\EstructuracontrolController@activar');
    route::get('estructurainactiva/{id?}', 'App\Http\Controllers\EstructuracontrolController@inactiva');
    route::get('interioractivar/{id?}', 'App\Http\Controllers\InteriorcontrolController@activar');
    route::get('interiorinactiva/{id?}', 'App\Http\Controllers\InteriorcontrolController@inactiva');
    route::get('latoneriaactivar/{id?}', 'App\Http\Controllers\LatoneriacontrolController@activar');
    route::get('latoneriainactiva/{id?}', 'App\Http\Controllers\LatoneriacontrolController@inactiva');
    route::get('vidrioactivar/{id?}', 'App\Http\Controllers\VidriocontrolController@activar');
    route::get('vidrioinactiva/{id?}', 'App\Http\Controllers\VidriocontrolController@inactiva');
    route::get('pinturaactivar/{id?}', 'App\Http\Controllers\PinturacontrolController@activar');
    route::get('pinturainactiva/{id?}', 'App\Http\Controllers\PinturacontrolController@inactiva');
    route::get('vlucesactivar/{id?}', 'App\Http\Controllers\VlucescontrolController@activar');
    route::get('vlucesinactiva/{id?}', 'App\Http\Controllers\VlucescontrolController@inactiva');
    route::get('nfluidoactivar/{id?}', 'App\Http\Controllers\NfluidocontrolController@activar');
    route::get('nfluidoinactiva/{id?}', 'App\Http\Controllers\NfluidocontrolController@inactiva');
    route::get('compresionactivar/{id?}', 'App\Http\Controllers\CompresioncontrolController@activar');
    route::get('compresioninactiva/{id?}', 'App\Http\Controllers\CompresioncontrolController@inactiva');
    route::get('luzactivar/{id?}', 'App\Http\Controllers\LuzcontrolController@activar');
    route::get('luzinactiva/{id?}', 'App\Http\Controllers\LuzcontrolController@inactiva');
    route::get('frenoactivar/{id?}', 'App\Http\Controllers\FrenocontrolController@activar');
    route::get('frenoinactiva/{id?}', 'App\Http\Controllers\FrenocontrolController@inactiva');
    route::get('bajaactivar/{id?}', 'App\Http\Controllers\BajacontrolController@activar');
    route::get('bajainactiva/{id?}', 'App\Http\Controllers\BajacontrolController@inactiva');
    route::get('equipoactivar/{id?}', 'App\Http\Controllers\EquipocontrolController@activar');
    route::get('equipoinactiva/{id?}', 'App\Http\Controllers\EquipocontrolController@inactiva');
    route::get('vehiculoactivar/{id?}', 'App\Http\Controllers\VehiculoController@activar');
    route::get('vehiculoinactiva/{id?}', 'App\Http\Controllers\VehiculoController@inactiva');
    route::get('cierreactivar/{id?}', 'App\Http\Controllers\CierreController@activar');
    route::get('cierreinactiva/{id?}', 'App\Http\Controllers\CierreController@inactiva');
    route::get('archivoactivar/{id?}', 'App\Http\Controllers\ArchivocontrolController@activar');
    route::get('archivoinactiva/{id?}', 'App\Http\Controllers\ArchivocontrolController@inactiva');
    route::get('escaneractivar/{id?}', 'App\Http\Controllers\EscanercontrolController@activar');
    route::get('escanerinactiva/{id?}', 'App\Http\Controllers\EscanercontrolController@inactiva');
});