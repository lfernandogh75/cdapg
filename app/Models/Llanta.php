<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Llanta extends Model
{
    use HasFactory;
    public function llantacontrol(){
        return $this->belongsTo('App\Models\Llantacontrol');
    }
    
    public function llantapart(){
        return $this->belongsTo('App\Models\Llantapart');
    }
}
