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
            'keyword' => 'autoservicio'
        ]);

        PalabraClave::create([
            'keyword' => 'sabritas'
        ]);

        PalabraClave::create([
            'keyword' => 'hamburguesa'
        ]);

        PalabraClave::create([
            'keyword' => 'hot dog'
        ]);

        PalabraClave::create([
            'keyword' => 'papas fritas'
        ]);

        PalabraClave::create([
            'keyword' => 'cerveza'
        ]);

        PalabraClave::create([
            'keyword' => 'refresco'
        ]);

        PalabraClave::create([
            'keyword' => 'coca cola'
        ]);

        PalabraClave::create([
            'keyword' => 'chocolate'
        ]);

        PalabraClave::create([
            'keyword' => 'huitzilla'
        ]);

        PalabraClave::create([
            'keyword' => 'cajita feliz'
        ]);

        PalabraClave::create([
            'keyword' => 'sabor'
        ]);

        PalabraClave::create([
            'keyword' => 'velocidad'
        ]);
    }
}
