<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Latoneria extends Model
{
    use HasFactory;
    public function latoneriacontrol(){
        return $this->belongsTo('App\Models\Latoneriacontrol');
    }
    
    public function latoneriapart(){
        return $this->belongsTo('App\Models\Latoneriapart');
    }
}
