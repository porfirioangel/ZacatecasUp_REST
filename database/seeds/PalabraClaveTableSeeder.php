<?php

use App\PalabraClave;
use Illuminate\Database\Seeder;

class PalabraClaveTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PalabraClave::create([
            'keyword' => 'Autoservicio'
        ]);

        PalabraClave::create([
            'keyword' => 'Sabritas'
        ]);

        PalabraClave::create([
            'keyword' => 'Hamburguesa'
        ]);

        PalabraClave::create([
            'keyword' => 'Hot dog'
        ]);

        PalabraClave::create([
            'keyword' => 'Papas fritas'
        ]);

        PalabraClave::create([
            'keyword' => 'Cerveza'
        ]);

        PalabraClave::create([
            'keyword' => 'Refresco'
        ]);

        PalabraClave::create([
            'keyword' => 'Coca Cola'
        ]);

        PalabraClave::create([
            'keyword' => 'Chocolate'
        ]);

        PalabraClave::create([
            'keyword' => 'Huitzilla'
        ]);

        PalabraClave::create([
            'keyword' => 'Cajita feliz'
        ]);

        PalabraClave::create([
            'keyword' => 'Sabor'
        ]);

        PalabraClave::create([
            'keyword' => 'Velocidad'
        ]);
    }
}
