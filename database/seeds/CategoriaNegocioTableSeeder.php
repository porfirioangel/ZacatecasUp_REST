<?php

use App\CategoriaNegocio;
use Illuminate\Database\Seeder;

class CategoriaNegocioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriaNegocio::create([
            'id' => 1,
            'categoria' => 'Cafés'
        ]);

        CategoriaNegocio::create([
            'id' => 2,
            'categoria' => 'Comida'
        ]);

        CategoriaNegocio::create([
            'id' => 3,
            'categoria' => 'Bares'
        ]);

        CategoriaNegocio::create([
            'id' => 5,
            'categoria' => 'Servicios'
        ]);
    }
}
