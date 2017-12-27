<?php

use App\CalificacionNegocio;
use Illuminate\Database\Seeder;

class CalificacionNegocioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Calificacionnegocio::create([
            'usuario_id' => 1,
            'negocio_id' => 1,
            'calificacion' => 5
        ]);

        Calificacionnegocio::create([
            'usuario_id' => 1,
            'negocio_id' => 2,
            'calificacion' => 4
        ]);

        Calificacionnegocio::create([
            'usuario_id' => 2,
            'negocio_id' => 1,
            'calificacion' => 3
        ]);

        Calificacionnegocio::create([
            'usuario_id' => 2,
            'negocio_id' => 2,
            'calificacion' => 5
        ]);

        Calificacionnegocio::create([
            'usuario_id' => 3,
            'negocio_id' => 1,
            'calificacion' => 5
        ]);

        Calificacionnegocio::create([
            'usuario_id' => 4,
            'negocio_id' => 2,
            'calificacion' => 4
        ]);
    }
}
