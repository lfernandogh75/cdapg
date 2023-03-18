<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstructurapartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'PARAL PANORAMICO'],
            ['name' => 'PARAL PUERTA'],
            ['name' => 'LARGUERO TECHO'],
            ['name' => 'PARAL CENTRAL'],
            ['name' => 'PARAL PANORAMICO'],
            ['name' => 'ESTRIBO'],
            ['name' => 'PANEL TRASERO'],
            ['name' => 'GUARDAPOLVO METALICO'],
            ['name' => 'ESTRIBO'],
            ['name' => 'MARCO FRONTAL'],
            ['name' => 'PANEL PARALLAMAS']
            
    ];

    foreach ($data as $nombre) {
        DB::table('colors')->insert(
            ['nombre' => $nombre]
         );
    }


    }
}
