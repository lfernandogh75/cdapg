<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suspensioncontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function suspensionparts(){
        return $this->hasMany('App\Models\Suspension');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}

