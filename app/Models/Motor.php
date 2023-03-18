<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Motorpark;

class Motor extends Model
{
    use HasFactory;
  /*  public function peritaje(){
        return $this->belongsTo('App\Models\Peritaje');
    }
    public function pieza($id){
        $pieza = Motorpark::find($id);  
        return $pieza->name;
    }
    public function motorpark(){
        return $this->belongsTo('App\Models\Motorpark');
    }*/
    public function motorcontrol(){
        return $this->belongsTo('App\Models\Motorcontrol');
    }
    public function pieza($id){
        $pieza = Motorpark::find($id);  
        return $pieza->name;
    }
    public function motorpark(){
        return $this->belongsTo('App\Models\Motorpark');
    }
}
