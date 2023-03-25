<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BajapartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     /*   $datas = [
            ['name' => 'BUJES ESTABILIZADORES'],
            ['name' => 'BUJES TIJERA'],
            ['name' => 'CATALIZADOR'],
            ['name' => 'CRUCETAS']
    ];*/
    $datas = array("BUJES ESTABILIZADORES",
     "BUJES TIJERA",
      "CATALIZADOR",
       "CRUCETAS");
      
    foreach ($datas as $name ) {
        $fechacreate= date('Y-m-d H:m:s');
        $fechaedit= date('Y-m-d H:m:s');
        $nombre=$name;
        DB::table('bajaparts')->insert(
            [
            'created_at'=>$fechacreate,
            'updated_at'=>$fechaedit,
            'name'=>$nombre,
            ]
           
           
            );
    }
    }
}
