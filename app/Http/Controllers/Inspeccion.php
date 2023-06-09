<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peritaje;
use App\Models\Vehiculo;

class Inspeccion extends Controller
{
    public function index($id)
    {
        $vehiculo=Vehiculo::find($id);
        $peritaje=Peritaje::find( $vehiculo->peritaje_id);
      
        if($vehiculo->clase_vehiculo=="Automóvil"){
            if($peritaje->tipo=="BÁSICO"){
                
               // return view('vehiculo.firma.documento')->with('vehiculo',$vehiculo);
               return view('vehiculo.firma.informeautomovilbasico')->with(compact('vehiculo','peritaje'));
                
            }
            if($peritaje->tipo=="COMPLETO"){
                
               // return view('vehiculo.firma.documento')->with('vehiculo',$vehiculo);
               return view('vehiculo.firma.informeautomovilcompleto')->with(compact('vehiculo','peritaje'));
                
            }
            if($peritaje->tipo=="OTROS"){
                
               // return view('vehiculo.firma.documento')->with('vehiculo',$vehiculo);
               return view('vehiculo.firma.informeautomovilotros')->with(compact('vehiculo','peritaje'));
                
            }
          }
          if($vehiculo->clase_vehiculo=="Motocicleta"){
            if($peritaje->tipo=="BÁSICO"){
                
               // return view('vehiculo.firma.documento')->with('vehiculo',$vehiculo);
               return view('vehiculo.firma.informemotobasico')->with(compact('vehiculo','peritaje'));
                
            }
            if($peritaje->tipo=="COMPLETO"){
                
              // return view('vehiculo.firma.documento')->with('vehiculo',$vehiculo);
              return view('vehiculo.firma.informemotocompleto')->with(compact('vehiculo','peritaje'));
               
           }
           if($peritaje->tipo=="OTROS"){
                
            // return view('vehiculo.firma.documento')->with('vehiculo',$vehiculo);
            return view('vehiculo.firma.informemotootro')->with(compact('vehiculo','peritaje'));
             
         }
          }

          if($vehiculo->clase_vehiculo=="Pesados"){
            if($peritaje->tipo=="BÁSICO"){
                
               // return view('vehiculo.firma.documento')->with('vehiculo',$vehiculo);
               return view('vehiculo.firma.informepesadobasico')->with(compact('vehiculo','peritaje'));
                
            }
            if($peritaje->tipo=="COMPLETO"){
                
               // return view('vehiculo.firma.documento')->with('vehiculo',$vehiculo);
               return view('vehiculo.firma.informepesadocompleto')->with(compact('vehiculo','peritaje'));
                
            }
            if($peritaje->tipo=="OTROS"){
                
               // return view('vehiculo.firma.documento')->with('vehiculo',$vehiculo);
               return view('vehiculo.firma.informepesadootros')->with(compact('vehiculo','peritaje'));
                
            }
          }
    }
}
