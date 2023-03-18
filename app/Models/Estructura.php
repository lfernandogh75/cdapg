<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estructura extends Model
{
    use HasFactory;
    public function estructuracontrol(){
        return $this->belongsTo('App\Models\Estructuracontrol');
    }
    
    public function estructurapart(){
        return $this->belongsTo('App\Models\Estructurapart');
    }
}
