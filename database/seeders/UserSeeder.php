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
        

        DB::table('users')->insert([
            'name' => 'superadmin',
            'email' => 'fernandogh75@gmail.com',
            'role_id'=>1,
            'password'=> Hash::make('password')
        ]);
    }
}
