<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FluidopartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'FUGAS DE LIQUIDO DE FRENO'],
            ['name' => 'FUGA DE REFRIGERANTE'],
            ['name' => 'ACEITE MOTOR'],
            ['name' => 'DIRECCION HIDRAULICA'],
            ['name' => 'ACEITE TRANSMISION'],
            ['name' => 'LIQUIDO DE FRENOS'],
            ['name' => 'REFRIGERANTE']

            
    ];

    foreach ($data as $name) {
        DB::table('fluidoparts')->insert(
            ['name' => $name]
         );
    }
    }
}
