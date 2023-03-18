<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bajacontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function bajaparts(){
        return $this->hasMany('App\Models\Baja');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
