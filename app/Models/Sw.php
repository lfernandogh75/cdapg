<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sw extends Model
{
    use HasFactory;
    public function swcontrol(){
        return $this->belongsTo('App\Models\Swcontrol');
    }
    
    public function swpart(){
        return $this->belongsTo('App\Models\Swpart');
    }
}
