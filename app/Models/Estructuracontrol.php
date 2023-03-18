<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estructuracontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function estructuraparts(){
        return $this->hasMany('App\Models\Estructura');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
