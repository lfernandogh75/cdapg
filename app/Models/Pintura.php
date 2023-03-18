<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pintura extends Model
{
    use HasFactory;
    public function pinturacontrol(){
        return $this->belongsTo('App\Models\Pinturacontrol');
    }
    
    public function latoneriapart(){
        return $this->belongsTo('App\Models\Latoneriapart');
    }
}
