<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotocontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function fotoparts(){
        return $this->hasMany('App\Models\Foto');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
