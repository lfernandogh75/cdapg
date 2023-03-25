<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

    foreach ($data as $name) {
        DB::table('estructuraparts')->insert(
            ['name' => $name]
         );
    }


    }
}
