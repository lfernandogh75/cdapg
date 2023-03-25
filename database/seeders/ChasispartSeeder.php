<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChasispartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'PUENTE TRAVIESA'],
            ['name' => 'PUNTA DE CHASIS DELANTERA IZQ'],
            ['name' => 'PUNTA DE CHASIS DELANTERA DER'],
            ['name' => 'PUNTA DE CHASIS TRASERA IZQ']
    ];

    foreach ($data as $name) {
        DB::table('chasisparts')->insert(
            ['name' => $name]
         );
    }
    }
}
