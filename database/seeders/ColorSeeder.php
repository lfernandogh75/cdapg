<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'NEGRO'],
            ['nombre' => 'BLANCO'],
            ['nombre' => 'VERDE'],
            ['nombre' => 'ROJO']
    ];

    foreach ($data as $nombre) {
        DB::table('colors')->insert(
            ['nombre' => $nombre]
         );
    }
    }
}
