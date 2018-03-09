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
            'url_foto' => '/uploads/' . sha1('promocion_' . 1 . '_1'),
            'negocio_id' => 1
        ]);

        PromocionNegocio::create([
            'url_foto' => '/uploads/' . sha1('promocion_' . 1 . '_2'),
            'negocio_id' => 1
        ]);

        PromocionNegocio::create([
            'url_foto' => '/uploads/' . sha1('promocion_' . 1 . '_3'),
            'negocio_id' => 1
        ]);
    }
}
