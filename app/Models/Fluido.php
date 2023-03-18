<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fluido extends Model
{
    use HasFactory;
    public function fluidocontrol(){
        return $this->belongsTo('App\Models\Fluidocontrol');
    }
    
    public function fluidopart(){
        return $this->belongsTo('App\Models\Fluidopart');
    }
}
