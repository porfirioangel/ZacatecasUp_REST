<?php

use App\PromocionNegocio;
use Illuminate\Database\Seeder;

class PromocionNegocioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PromocionNegocio::create([
            'url_foto' => '/uploads/' . sha1('promocion_' . 4 . '_1'),
            'negocio_id' => 4
        ]);

        PromocionNegocio::create([
            'url_foto' => '/uploads/' . sha1('promocion_' . 4 . '_2'),
            'negocio_id' => 4
        ]);

        PromocionNegocio::create([
            'url_foto' => '/uploads/' . sha1('promocion_' . 4 . '_3'),
            'negocio_id' => 4
        ]);

        PromocionNegocio::create([
            'url_foto' => '/uploads/' . sha1('promocion_' . 3 . '_1'),
            'negocio_id' => 3
        ]);

        PromocionNegocio::create([
            'url_foto' => '/uploads/' . sha1('promocion_' . 3 . '_2'),
            'negocio_id' => 3
        ]);

        PromocionNegocio::create([
            'url_foto' => '/uploads/' . sha1('promocion_' . 3 . '_3'),
            'negocio_id' => 3
        ]);
    }
}
