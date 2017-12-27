<?php

use App\DuenoNegocio;
use Illuminate\Database\Seeder;

class DuenoNegocioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DuenoNegocio::create([
            'usuario_id' => 3,
            'negocio_id' => 1
        ]);

        DuenoNegocio::create([
            'usuario_id' => 4,
            'negocio_id' => 2
        ]);
    }
}
