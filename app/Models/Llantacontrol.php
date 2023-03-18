<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Llantacontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function llantaparts(){
        return $this->hasMany('App\Models\Llanta');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
