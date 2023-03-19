<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'MECANICO'],
            ['nombre' => 'AUTOMATICO']       
    ];

    foreach ($data as $nombre) {
        DB::table('transmisions')->insert(
            ['nombre' => $nombre]
         );
    }
    }
}
