<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CombustibleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'GASOLINA'],
            ['nombre' => 'DIESEL'],
            ['nombre' => 'GAS'],
            ['nombre' => 'MIXTO'],
            ['nombre' => 'ELECTRICO'], 
            ['nombre' => 'HIDROGENO'],
            ['nombre' => 'ETANOL'], 
            ['nombre' => 'BIODIESEL']            
    ];

    foreach ($data as $nombre) {
        DB::table('combustibles')->insert(
            ['nombre' => $nombre]
         );
    }
    }
}
