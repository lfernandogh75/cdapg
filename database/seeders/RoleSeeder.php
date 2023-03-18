<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre_rol' => 'admin'],
            ['nombre_rol' => 'DIRECTOR_TÉCNICO'],
            ['nombre_rol' => 'INSPECTOR_EN_LÍNEA']
          
    ];
    foreach ($data as $nombre) {
        DB::table('roles')->insert(
            ['nombre_rol' => $nombre]
         );
    }
    }
}
