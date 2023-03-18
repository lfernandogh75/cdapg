<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vluces extends Model
{
    use HasFactory;
    public function vlucescontrol(){
        return $this->belongsTo('App\Models\Vlucescontrol');
    }
    
    public function luzpart(){
        return $this->belongsTo('App\Models\Luzpart');
    }

}
