<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert(
            ['nombre_rol' => 'superadmin']
         );
         DB::table('roles')->insert(
            ['nombre_rol' => 'INSPECTOR_EN_LÍNEA']
         );
        

        DB::table('users')->insert([
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'role_id'=>1,
            'password'=> Hash::make('password')
        ]);
    }
}
