<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vidriocontrol extends Model
{
    use HasFactory;
    public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function vidrioparts(){
        return $this->hasMany('App\Models\Vidrio');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
