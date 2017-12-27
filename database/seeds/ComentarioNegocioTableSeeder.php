<?php

use App\ComentarioNegocio;
use Illuminate\Database\Seeder;

class ComentarioNegocioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ComentarioNegocio::create([
            'usuario_id' => 1,
            'negocio_id' => 1,
            'comentario' => 'Placentera visita a este lugar',
            'fecha' => '2017-12-26 21:27:38'
        ]);

        ComentarioNegocio::create([
            'usuario_id' => 1,
            'negocio_id' => 2,
            'comentario' => 'No me gustó',
            'fecha' => '2017-12-26 21:27:50'
        ]);

        ComentarioNegocio::create([
            'usuario_id' => 2,
            'negocio_id' => 1,
            'comentario' => 'Excelente amigos',
            'fecha' => '2017-12-27 21:28:03'
        ]);

        ComentarioNegocio::create([
            'usuario_id' => 2,
            'negocio_id' => 1,
            'comentario' => 'Ahora no me gustó',
            'fecha' => '2017-12-29 21:28:19'
        ]);

        ComentarioNegocio::create([
            'usuario_id' => 3,
            'negocio_id' => 1,
            'comentario' => 'Más o menos',
            'fecha' => '2017-11-26 21:28:32'
        ]);

        ComentarioNegocio::create([
            'usuario_id' => 4,
            'negocio_id' => 2,
            'comentario' => 'Muy sucio',
            'fecha' => '2017-12-26 21:28:47'
        ]);
    }
}
