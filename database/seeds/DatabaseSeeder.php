<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsuarioTableSeeder::class);
        $this->call(CategoriaNegocioTableSeeder::class);
        $this->call(SuscripcionTableSeeder::class);
        $this->call(NegocioTableSeeder::class);
        $this->call(CalificacionNegocioTableSeeder::class);
        $this->call(ComentarioNegocioTableSeeder::class);
        $this->call(DuenoNegocioTableSeeder::class);
        $this->call(PalabraClaveTableSeeder::class);
        $this->call(EtiquetaNegocioTableSeeder::class);
        $this->call(GaleriaNegocioTableSeeder::class);
    }
}
