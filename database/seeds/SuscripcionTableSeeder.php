<?php

use App\Suscripcion;
use Illuminate\Database\Seeder;

class SuscripcionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suscripcion::create([
            'id' => 1,
            'tipo' => 'Premium',
            'fecha_inicio' => '2018-12-01',
            'fecha_fin' => '2018-12-31'
        ]);

        Suscripcion::create([
            'id' => 2,
            'tipo' => 'Normal',
            'fecha_inicio' => '2018-11-01',
            'fecha_fin' => '2018-12-31'
        ]);

        Suscripcion::create([
            'id' => 3,
            'tipo' => 'Premium',
            'fecha_inicio' => '2018-12-26',
            'fecha_fin' => '2018-12-31'
        ]);

        Suscripcion::create([
            'id' => 4,
            'tipo' => 'Normal',
            'fecha_inicio' => '2018-07-01',
            'fecha_fin' => '2018-12-31'
        ]);
    }
}
