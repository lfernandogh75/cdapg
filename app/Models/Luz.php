<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Luz extends Model
{
    use HasFactory;
    public function luzcontrol(){
        return $this->belongsTo('App\Models\Luzcontrol');
    }
    
    public function luzpart(){
        return $this->belongsTo('App\Models\Luzpart');
    }
}
