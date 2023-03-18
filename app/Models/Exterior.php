<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Exteriorpart;

class Exterior extends Model
{
    use HasFactory;
    public function exteriorcontrol(){
        return $this->belongsTo('App\Models\Exteriorcontrol');
    }
    public function pieza($id){
        $pieza = Exteriorpart::find($id);  
        return $pieza->name;
    }
    public function exteriorpart(){
        return $this->belongsTo('App\Models\Exteriorpart');
    }
}
