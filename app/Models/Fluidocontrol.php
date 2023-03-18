<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fluidocontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function fluidoparts(){
        return $this->hasMany('App\Models\Fluido');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
