<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Electricalpart;

class Electrico extends Model
{
    use HasFactory;
    public function electricocontrol(){
        return $this->belongsTo('App\Models\Electricocontrol');
    }
    public function pieza($id){
        $pieza = Electricalpart::find($id);  
        return $pieza->name;
    }
    //para que funcione es necesario que tenga el mismo nombre del modelo 
    public function electricalpart(){
        return $this->belongsTo('App\Models\Electricalpart');
    }
    
    
}
