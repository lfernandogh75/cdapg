<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarjeta extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function marca(){
        return $this->belongsTo('App\Models\Marca');
    }
    public function linea(){
        return $this->belongsTo('App\Models\Linea');
    }
    public function transmision(){
        return $this->belongsTo('App\Models\Transmision');
    }
    public function carroceria(){
        return $this->belongsTo('App\Models\Carroceria');
    }
    public function combustible(){
        return $this->belongsTo('App\Models\Combustible');
    }
    public function color(){
        return $this->belongsTo('App\Models\Color');
    }
    public function servicio(){
        return $this->belongsTo('App\Models\Servicio');
    }
}
