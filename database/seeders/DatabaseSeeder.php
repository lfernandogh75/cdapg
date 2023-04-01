<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run():void
    {

        $this->call([
            ColorSeeder::class,
            ServicioSeeder::class,
            BajapartSeeder::class,
            ChasispartSeeder::class,
            CompresionpartSeeder::class,
            ElectricalpartSeeder::class,
            EstructurapartSeeder::class,
            CombustibleSeeder::class,
            TransmisionSeeder::class,
            UserSeeder::class,
            CarroceriaSeeder::class,
            FotopartSeeder::class,
            FrenopartSeeder::class,
            FluidopartSeeder::class,
            InteriorpartSeeder::class,
            ExteriorpartSeeder::class,
            LatoneriapartSeeder::class,
            LlantapartSeeder::class,
            LuzpartSeeder::class,
            MotorparkSeeder::class,
            SuspensionpartSeeder::class,
            VidriopartSeeder::class,
            MarcaslineasSeeder::class,
            EmpresaSeeder::class,




             
             
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
