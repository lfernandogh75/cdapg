<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VidriopartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'PANORAMICO DELANTERO'],
            ['name' => 'LATERAL DELANTERO IZQUIERDO'],
            ['name' => 'LATERAL TRASERO IZQUIERDO'],
            ['name' => 'LATERAL DELANTERO DERECHO'],
            ['name' => 'LATERAL TRASERO DERECHO']    
           
    ];

    foreach ($data as $name) {
        DB::table('vidrioparts')->insert(
            ['name' => $name]
         );
    }
    }
}
