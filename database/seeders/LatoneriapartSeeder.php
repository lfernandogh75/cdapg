<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LatoneriapartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'GUARDAFANGO'],
            ['name' => 'PUERTA DELANTERA'],
            ['name' => 'PUERTA TRASERA'],
            ['name' => 'COSTADO'],
            ['name' => 'AMPLIACION DELANTERA'],
            ['name' => 'TAPAS LATELAR'],
            ['name' => 'RETROVISOR'],
            ['name' => 'TAPA BAUL/COMPUERTA']     
    ];

    foreach ($data as $name) {
        DB::table('latoneriaparts')->insert(
            ['name' => $name]
         );
    }
    }
}
