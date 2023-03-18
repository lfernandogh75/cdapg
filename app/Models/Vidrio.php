<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vidrio extends Model
{
    use HasFactory;
    public function vidriocontrol(){
        return $this->belongsTo('App\Models\Vidriocontrol');
    }
    
    public function vidriopart(){
        return $this->belongsTo('App\Models\Vidriopart');
    }
    
}
