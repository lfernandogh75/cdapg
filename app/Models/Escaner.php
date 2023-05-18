<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Escaner extends Model
{
    use HasFactory;
    public function escanercontrol(){
        return $this->belongsTo('App\Models\Escanercontrol');
    }
}
