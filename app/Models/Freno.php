<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Freno extends Model
{
    use HasFactory;
    public function frenocontrol(){
        return $this->belongsTo('App\Models\Frenocontrol');
    }
    
    public function frenopart(){
        return $this->belongsTo('App\Models\Frenopart');
    }
}
