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
            'url_foto' => '/uploads/7520e54e7d7ff40f8f6440bd69a6eb74ca1d93f5',
            'negocio_id' => 1
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/08cca321d1b894202793ae449e2ff7d99e581b7c',
            'negocio_id' => 1
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/7bceeb62169251b48632c613ead622237341e96a',
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
