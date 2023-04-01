<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresas')->insert([
            'razonsocial' => 'Sin definir',
            'nit' => 'Sin definir',
            'direccion' => 'Sin definir',
            'telefono'=>'Sin definir',
            'pagina'=>'Sin definir',
            'representantelegal'=>'Sin definir'
        ]);
        DB::table('empresas')->insert([
            'razonsocial' => 'Sin definir',
            'nit' => 'Sin definir',
            'direccion' => 'Sin definir',
            'telefono'=>'Sin definir',
            'pagina'=>'Sin definir',
            'representantelegal'=>'Sin definir'
        ]);
    }
}
