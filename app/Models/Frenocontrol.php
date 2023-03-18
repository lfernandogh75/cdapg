<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Frenocontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function frenoparts(){
        return $this->hasMany('App\Models\Freno');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
