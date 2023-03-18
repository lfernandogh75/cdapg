<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interior extends Model
{
    use HasFactory;
    public function interiorcontrol(){
        return $this->belongsTo('App\Models\Interiorcontrol');
    }
    
    public function interiorpart(){
        return $this->belongsTo('App\Models\Interiorpart');
    }
}
