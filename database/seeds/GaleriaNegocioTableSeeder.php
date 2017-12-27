<?php

use App\GaleriaNegocio;
use Illuminate\Database\Seeder;

class GaleriaNegocioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GaleriaNegocio::create([
            'url_foto' => 'fotos/oxxo_1.png',
            'negocio_id' => 1
        ]);

        GaleriaNegocio::create([
            'url_foto' => 'fotos/oxxo_2.png',
            'negocio_id' => 1
        ]);

        GaleriaNegocio::create([
            'url_foto' => 'fotos/oxxo_3.png',
            'negocio_id' => 1
        ]);

        GaleriaNegocio::create([
            'url_foto' => 'fotos/macdonalds_1.png',
            'negocio_id' => 2
        ]);

        GaleriaNegocio::create([
            'url_foto' => 'fotos/macdonalds_2.png',
            'negocio_id' => 2
        ]);

        GaleriaNegocio::create([
            'url_foto' => 'fotos/macdonalds_3.png',
            'negocio_id' => 2
        ]);
    }
}
