<?php

use Illuminate\Database\Seeder;
use App\Evento;

class EventoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evento::create([
            'id' => 1,
            'nombre' => 'Natalia Lafourcade',
            'descripcion' => 'Natalia Lafourcade en concierto',
            'fecha_inicio' => '2018-03-23 19:00:00',
            'fecha_fin' => '2018-03-23 22:00:00',
            'latitud' => '22.7760702',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/' . sha1('evento_' . 1),
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 2,
            'nombre' => 'Golden Ganga',
            'descripcion' => 'Golden Ganga en concierto',
            'fecha_inicio' => '2018-03-24 19:00:00',
            'fecha_fin' => '2018-03-24 22:00:00',
            'latitud' => '22.7760702',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/' . sha1('evento_' . 2),
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 3,
            'nombre' => 'Ramón Vargas',
            'descripcion' => 'Exposición de Ramón Vargas',
            'fecha_inicio' => '2018-03-21 19:00:00',
            'fecha_fin' => '2018-03-21 22:00:00',
            'latitud' => '22.7760702',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/' . sha1('evento_' . 3),
            'categoria_evento_id' => 2
        ]);

    }
}
