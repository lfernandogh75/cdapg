<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorparkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
            $data = [
                ['name' => 'MOTOR'],
                ['name' => 'TREN DE ARRASTRE'],
                ['name' => 'CORREA ACCESORIOS'],
                ['name' => 'RADIADOR'],
                ['name' => 'TOLERANCIA DE CADENA']    
               
        ];
    
        foreach ($data as $name) {
            DB::table('motorparks')->insert(
                ['name' => $name]
             );
        }
    }
}
