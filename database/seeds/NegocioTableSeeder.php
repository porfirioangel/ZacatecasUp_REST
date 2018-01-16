<?php

use App\Negocio;
use Illuminate\Database\Seeder;

class NegocioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Negocio::create([
            'id' => 1,
            'nombre' => 'OXXO',
            'latitud' => 22.65359700,
            'longitud' => -102.98385660,
            'descripcion_breve' => 'Encuentras lo que quieras',
            'descripcion_completa' => 'descripciones/oxxo.json',
            'url_logo' =>  '/uploads/' . sha1('logo_negocio' . 1),
            'sitio_web' => 'http://www.oxxo.com',
            'facebook' => 'https://www.facebook.com/oxxo',
            'categoria_negocio_id' => 1,
            'suscripcion_id' => 1
        ]);

        Negocio::create([
            'id' => 2,
            'nombre' => 'McDonald\'s',
            'latitud' => 22.77360900,
            'longitud' => -102.57613690,
            'descripcion_breve' => 'Comida rápida exquisita',
            'descripcion_completa' => 'descripciones/macdonalds.json',
            'url_logo' => '/uploads/' . sha1('logo_negocio' . 2),
            'sitio_web' => 'http://www.macdonalds.com',
            'facebook' => 'https://www.facebook.com/macdonalds',
            'categoria_negocio_id' => 2,
            'suscripcion_id' => 2
        ]);
    }
}
