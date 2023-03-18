<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    use HasFactory;
    public function fotocontrol(){
        return $this->belongsTo('App\Models\Fotocontrol');
    }
    
    public function fotopart(){
        return $this->belongsTo('App\Models\Fotopart');
    }
}
