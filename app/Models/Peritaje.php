<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peritaje extends Model
{
    use HasFactory;
    public function vehiculo(){
        return $this->hasOne('App\Models\Vehiculo');
        
    }
    public function tarjeta(){
        return $this->hasOne('App\Models\Tarjeta');
        
    }
    public function emisiongas(){
        return $this->hasOne('App\Models\Emisiongas');
        
    }
    public function simetria(){
        return $this->hasOne('App\Models\Simetria');
        
    }

    
   /* public function piezaselectricas(){
        return $this->hasMany('App\Models\Electrico');
    }
    public function piezasmotor(){
        return $this->hasMany('App\Models\Motor');
    }*/
    public function electricocontrol(){
        return $this->hasOne('App\Models\Electricocontrol');
    }
    public function exteriorcontrol(){
        return $this->hasOne('App\Models\Exteriorcontrol');
        
    }
    public function motorcontrol(){
        return $this->hasOne('App\Models\Motorcontrol');
        
    }
    public function fluidocontrol(){
        return $this->hasOne('App\Models\Fluidocontrol');
        
    }
    public function llantacontrol(){
        return $this->hasOne('App\Models\Llantacontrol');
        
    }
    public function suspensioncontrol(){
        return $this->hasOne('App\Models\Suspensioncontrol');
        
    }
    public function compresioncontrol(){
        return $this->hasOne('App\Models\Compresioncontrol');
        
    }
    public function luzcontrol(){
        return $this->hasOne('App\Models\Luzcontrol');
        
    }
    public function frenocontrol(){
        return $this->hasOne('App\Models\Frenocontrol');
        
    }
    public function fotocontrol(){
        return $this->hasOne('App\Models\Fotocontrol');
        
    }
    public function archivocontrol(){
        return $this->hasOne('App\Models\Archivocontrol');
        
    }
    public function chasiscontrol(){
        return $this->hasOne('App\Models\Chasiscontrol');
        
    }
    public function interiorcontrol(){
        return $this->hasOne('App\Models\Interiorcontrol');
        
    }
    public function vidriocontrol(){
        return $this->hasOne('App\Models\Vidriocontrol');
        
    }
    public function latoneriacontrol(){
        return $this->hasOne('App\Models\Latoneriacontrol');
        
    }
    public function estructuracontrol(){
        return $this->hasOne('App\Models\Estructuracontrol');
        
    }
    public function pinturacontrol(){
        return $this->hasOne('App\Models\Pinturacontrol'); 
        
    }
    public function vlucescontrol(){
        return $this->hasOne('App\Models\Vlucescontrol');
        
    }
    public function nfluidocontrol(){
        return $this->hasOne('App\Models\Nfluidocontrol');
        
    }
    public function bajacontrol(){
        return $this->hasOne('App\Models\Bajacontrol');
        
    }
    public function equipocontrol(){
        return $this->hasOne('App\Models\Equipocontrol');
        
    }
    public function swcontrol(){
        return $this->hasOne('App\Models\Swcontrol');
        
    }
    public function cierre(){
        return $this->hasOne('App\Models\Cierre');
        
    }

    public function escanercontrol(){
        return $this->hasOne('App\Models\Escanercontrol');
        
    }
    
}
