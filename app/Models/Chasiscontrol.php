<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chasiscontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function chasisparts(){
        return $this->hasMany('App\Models\Chasis');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
