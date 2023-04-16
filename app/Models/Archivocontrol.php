<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivocontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function archivoparts(){
        return $this->hasMany('App\Models\Archivo');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
