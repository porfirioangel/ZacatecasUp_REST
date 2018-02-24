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
            'url_foto' => '/uploads/' . sha1('galeria_' . 1 . '_1'),
            'negocio_id' => 1
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/' . sha1('galeria_' . 1 . '_2'),
            'negocio_id' => 1
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/' . sha1('galeria_' . 1 . '_3'),
            'negocio_id' => 1
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/' . sha1('galeria_' . 2 . '_1'),
            'negocio_id' => 2
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/' . sha1('galeria_' . 2 . '_2'),
            'negocio_id' => 2
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/' . sha1('galeria_' . 2 . '_3'),
            'negocio_id' => 2
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/' . sha1('galeria_' . 3 . '_1'),
            'negocio_id' => 3
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/' . sha1('galeria_' . 3 . '_2'),
            'negocio_id' => 3
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/' . sha1('galeria_' . 3 . '_3'),
            'negocio_id' => 3
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/' . sha1('galeria_' . 4 . '_1'),
            'negocio_id' => 4
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/' . sha1('galeria_' . 4 . '_2'),
            'negocio_id' => 4
        ]);

        GaleriaNegocio::create([
            'url_foto' => '/uploads/' . sha1('galeria_' . 4 . '_3'),
            'negocio_id' => 4
        ]);
    }
}
