<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LlantapartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'DELANTERA'],
            ['name' => 'TRASERA'],
            ['name' => 'DELANTERA DERECHA'],
            ['name' => 'TRASERA DERECHA'],
            ['name' => 'DELANTERA IZQUIERDA'],     
            ['name' => 'TRASERA IZQUIERDA'] 
    ];

    foreach ($data as $name) {
        DB::table('llantaparts')->insert(
            ['name' => $name]
         );
    }
    }
}
