<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chasis extends Model
{
    use HasFactory;
    public function chasiscontrol(){
        return $this->belongsTo('App\Models\Chasiscontrol');
    }
    
    public function chasispart(){
        return $this->belongsTo('App\Models\Chasispart');
    }
}
