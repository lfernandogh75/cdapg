<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'PUBLICO'],
            ['nombre' => 'PARTICULAR']       
    ];

    foreach ($data as $nombre) {
        DB::table('servicios')->insert(
            ['nombre' => $nombre]
         );
    }
    }
}
