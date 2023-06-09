<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompresionpartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'CILINDRO 01'],
            ['name' => 'CILINDRO 02'],
            ['name' => 'CILINDRO 03'],
            ['name' => 'CILINDRO 03']
    ];

    foreach ($data as $name) {
        DB::table('compresionparts')->insert(
            ['name' => $name]
         );
    }
    }
}
