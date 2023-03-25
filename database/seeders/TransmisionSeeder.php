<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransmisionSeeder extends Seeder
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
            ['nombre' => 'AUTOMATICO'],
            ['nombre' => 'CONTINUAMENTE VARIABLE'],
            ['nombre' => 'DOBLE EMBRAGUE'],
            ['nombre' => 'OTRAS']

    ];

    foreach ($data as $nombre) {
        DB::table('transmisions')->insert(
            ['nombre' => $nombre]
         );
    }
    }
}
