<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElectricalpartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'ALARMA'],
            ['name' => 'BATERIA'],
            ['name' => 'BUJIA'],
            ['name' => 'COMANDO DE LUCES'],
            ['name' => 'DIRECCIONALES'],
            ['name' => 'ENCENDODO ELECTRICO'],
            ['name' => 'FAROLA'],
            ['name' => 'ODOMETRO'],
            ['name' => 'PITO'],
            ['name' => 'STOP']
    ];

    foreach ($data as $name) {
        DB::table('electricalparts')->insert(
            ['name' => $name]
         );
    }
    }
}
