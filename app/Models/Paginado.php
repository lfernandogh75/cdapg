<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paginado extends Model
{
    use HasFactory;
    public function paginadocontrol(){
        return $this->belongsTo('App\Models\Paginadocontrol');
    }
}
