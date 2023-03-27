<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarcaslineasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nombre' => 'CHEVROLET'],
            ['nombre' => 'MAZDA'],
            ['nombre' => 'NISSAN'],
            ['nombre' => 'RENAULT']
            
    ];

    foreach ($data as $nombre) {
        DB::table('marcas')->insert(
            ['nombre' => $nombre]
         );
    }



    $CHEVROLET = array("ALTO","APACHE","ASTRA","AVEO");
    $MAZDA = array("MAZDA2","MAZDA3","MAZDA5","ALLEGRO");
    $NISSAN = array("MARCH","SENTRA","VERSA","ALMERA");
    $RENAULT = array("ALASKA","CLIO","DUSTER","KWID");
      
for($i=0;$i<=3;$i++) {      
 DB::table('lineas')->insert(['nombre'=>$CHEVROLET[$i],'marca_id'=>1]);
 DB::table('lineas')->insert(['nombre'=>$MAZDA[$i],'marca_id'=>2]);
 DB::table('lineas')->insert(['nombre'=>$NISSAN[$i],'marca_id'=>3]);
 DB::table('lineas')->insert(['nombre'=>$RENAULT[$i],'marca_id'=>4]);

}


 }
}
