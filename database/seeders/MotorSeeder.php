<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MotorSeeder extends Seeder
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
            ['name' => 'TOLERANCIA DE CADENA'],
            ['name' => 'TREN DE ARRASTRE'],
            ['name' => 'CORREA ACCESORIOS'],
            ['name' => 'RADIADOR']
            
    ];

    foreach ($data as $name) {
        DB::table('motorparks')->insert(
            ['name' => $name]
         );
    }
    }
}
