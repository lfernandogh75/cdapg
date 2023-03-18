<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exteriorcontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function piezasexteriores(){
        return $this->hasMany('App\Models\Exterior');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
   
}
