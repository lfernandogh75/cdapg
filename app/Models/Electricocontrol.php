<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Electricocontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function piezaselectricas(){
        return $this->hasMany('App\Models\Electrico');
    }
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
