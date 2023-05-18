<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escanercontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function escanerparts(){
        return $this->hasMany('App\Models\Escaner');
    }
   

}
