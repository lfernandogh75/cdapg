<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;
    //relación uno a muchos
    public function lineas(){
        return $this->hasMany('App\Models\Linea');
    }
}
