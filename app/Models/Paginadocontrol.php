<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paginadocontrol extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function paginadoparts(){
        return $this->hasMany('App\Models\Paginado');
    }
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
}
