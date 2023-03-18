<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luzcontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function luzparts(){
        return $this->hasMany('App\Models\Luz');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
