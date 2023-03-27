<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LuzpartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'FAROLA'],
            ['name' => 'COCUYOS DERECHOS'],
            ['name' => 'FAROLA DERECHA'],
            ['name' => 'LUZ MEDIA DERECHA'],
            ['name' => 'FAROLA IZQUIERDA'],     
            ['name' => 'LUZ MEDIA IZQUIERDA'] 
    ];

    foreach ($data as $name) {
        DB::table('luzparts')->insert(
            ['name' => $name]
         );
    }
    }
}
