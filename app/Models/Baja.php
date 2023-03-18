<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baja extends Model
{
    use HasFactory;
    public function bajacontrol(){
        return $this->belongsTo('App\Models\Bajacontrol');
    }
    
    public function bajapart(){
        return $this->belongsTo('App\Models\Bajapart');
    }
}
