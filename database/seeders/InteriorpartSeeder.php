<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InteriorpartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
            $data = [
                ['name' => 'TAPIZADO SILLAS'],
                ['name' => 'CINTURONES DE SEGURIDAD'],
                ['name' => 'MANIJAS PUERTAS'],
                ['name' => 'COMANDO DE ELEVAVIDRIOS'],
                ['name' => 'GUANTERA']       
        ];
    
        foreach ($data as $name) {
            DB::table('interiorparts')->insert(
                ['name' => $name]
             );
        }
    }
}
