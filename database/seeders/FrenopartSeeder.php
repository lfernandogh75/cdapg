<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrenopartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'EJE1'],
            ['name' => 'EJE2'],
            ['name' => 'EJE3'],
            ['name' => 'EJE4'],
            ['name' => 'EJE5']       
    ];

    foreach ($data as $name) {
        DB::table('frenoparts')->insert(
            ['name' => $name]
         );
    }
    }
}
