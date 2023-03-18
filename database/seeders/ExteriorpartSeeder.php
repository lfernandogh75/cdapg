<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ExteriorpartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'ACORAZAMIENTO DE EMBRAGUE'],
            ['name' => 'ACELERADOR'],
            ['name' => 'CAPUCHON'],
            ['name' => 'EXHOSTO'],
            ['name' => 'FRENO DELANTERO'],
            ['name' => 'FRENO TRASERO'],
            ['name' => 'TACOMETRO'],
            ['name' => 'SILLIN'],
            ['name' => 'TAPA LATERAL DERECHA'],
            ['name' => 'TAPA LATERAL IZQUIERDA']
    ];

    foreach ($data as $name) {
        DB::table('exteriorparts')->insert(
            ['name' => $name]
         );
    }
    }
}
