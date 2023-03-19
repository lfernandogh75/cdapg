<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Linea extends Model
{
    use HasFactory;
    //relación uno a muchos inversa
    public function marca(){
        return $this->belongsTo('App\Models\Marca');
    }

}
