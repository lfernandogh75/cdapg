<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarroceriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'HATCHBACK'],
            ['nombre' => 'SUV'],
            ['nombre' => 'CROSSOVER'],
            ['nombre' => 'COUPÉ']
    ];

    foreach ($data as $nombre) {
        DB::table('carrocerias')->insert(
            ['nombre' => $nombre]
         );
    }
    }
}
