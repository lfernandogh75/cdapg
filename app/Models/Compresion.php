<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compresion extends Model
{
    use HasFactory;
    public function compresioncontrol(){
        return $this->belongsTo('App\Models\Compresioncontrol');
    }
    
    public function compresionpart(){
        return $this->belongsTo('App\Models\Compresionpart');
    }
}
