<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FotopartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'TARJETA CARA FRONTAL'],
            ['name' => 'TARJETA CARA POSTERIOR'],
            ['name' => 'FRONTAL'],
            ['name' => 'TRASERA'],
            ['name' => 'LATERAL DERECHA'],
            ['name' => 'LATERAL IZQUIERDA'],
            ['name' => 'SUPERIOR'],
            ['name' => 'MILLARE'],
            ['name' => 'ASIENTOS DELANTEROS'],
            ['name' => 'ASIENTOS TRASEROS'],
            ['name' => 'MOTOR'],
            ['name' => 'BAUL'],
            ['name' => 'TABLERO'],
            ['name' => 'NOVEDAD']
           
            
    ];

    foreach ($data as $name) {
        DB::table('fotoparts')->insert(
            ['name' => $name]
         );
    }
    }
}
