<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function piezasmotors(){
        return $this->hasMany('App\Models\Motor');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
       
}
