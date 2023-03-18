<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipocontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function equipoparts(){
        return $this->hasMany('App\Models\Equipo');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
