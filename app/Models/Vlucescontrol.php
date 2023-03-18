<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vlucescontrol extends Model
{
    use HasFactory;
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function luzparts(){
        return $this->hasMany('App\Models\Vluces');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
