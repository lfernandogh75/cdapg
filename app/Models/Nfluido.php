<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nfluido extends Model
{
    use HasFactory;
    public function nfluidocontrol(){
        return $this->belongsTo('App\Models\Nfluidocontrol');
    }
    
    public function fluidopart(){
        return $this->belongsTo('App\Models\Fluidopart');
    }
}
