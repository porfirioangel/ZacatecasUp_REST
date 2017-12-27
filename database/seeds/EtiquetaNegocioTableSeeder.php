<?php

use App\EtiquetaNegocio;
use Illuminate\Database\Seeder;

class EtiquetaNegocioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EtiquetaNegocio::create([
            'negocio_id' => 1,
            'palabra_clave_id' => 1
        ]);

        EtiquetaNegocio::create([
            'negocio_id' => 1,
            'palabra_clave_id' => 2
        ]);

        EtiquetaNegocio::create([
            'negocio_id' => 1,
            'palabra_clave_id' => 3
        ]);

        EtiquetaNegocio::create([
            'negocio_id' => 1,
            'palabra_clave_id' => 4
        ]);

        EtiquetaNegocio::create([
            'negocio_id' => 1,
            'palabra_clave_id' => 5
        ]);

        EtiquetaNegocio::create([
            'negocio_id' => 2,
            'palabra_clave_id' => 5
        ]);

        EtiquetaNegocio::create([
            'negocio_id' => 2,
            'palabra_clave_id' => 6
        ]);

        EtiquetaNegocio::create([
            'negocio_id' => 2,
            'palabra_clave_id' => 7
        ]);
    }
}
