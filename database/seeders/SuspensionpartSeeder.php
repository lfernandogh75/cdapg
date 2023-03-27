<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SuspensionpartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
            $data = [
                ['name' => 'BRAZO AXIAL DERECHO'],
                ['name' => 'BRAZO AXIAL IZQUIERDO'],
                ['name' => 'BUJES DE TIJERA DERECHA'],
                ['name' => 'BUJES DE TIJERA IZQUIERDA'],
                ['name' => 'ROTULA DERECHA']    
               
        ];
    
        foreach ($data as $name) {
            DB::table('suspensionparts')->insert(
                ['name' => $name]
             );
        }
    }
}
