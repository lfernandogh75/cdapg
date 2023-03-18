<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interiorcontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function interiorparts(){
        return $this->hasMany('App\Models\Interior');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
