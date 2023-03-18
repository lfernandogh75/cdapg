<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latoneriacontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function latoneriaparts(){
        return $this->hasMany('App\Models\Latoneria');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
