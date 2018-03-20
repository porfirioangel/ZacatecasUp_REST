<?php

use App\CategoriaEvento;
use Illuminate\Database\Seeder;

class CategoriaEventoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoriaEvento::create([
            'id' => 1,
            'categoria' => 'Conciertos'
        ]);

        CategoriaEvento::create([
            'id' => 2,
            'categoria' => 'Teatro'
        ]);

        CategoriaEvento::create([
            'id' => 3,
            'categoria' => 'Danza'
        ]);
    }
}
