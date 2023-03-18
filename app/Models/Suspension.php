<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suspension extends Model
{
    use HasFactory;
    public function suspensioncontrol(){
        return $this->belongsTo('App\Models\Suspensioncontrol');
    }
    
    public function suspensionpart(){
        return $this->belongsTo('App\Models\Suspensionpart');
    }
}
