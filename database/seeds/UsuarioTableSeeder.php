<?php

use App\Usuario;
use Illuminate\Database\Seeder;

class UsuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'id' => 1,
            'email' => 'porfirioads@gmail.com',
            'password' => 'e516f979536994a14d9b0500bca3a1287b9ea9fe',
            'nombre' => 'Porfirio Ángel Díaz Sánchez',
            'sexo' => 'H',
            'fecha_nacimiento' => '1997-08-21',
            'tipo_usuario' => 'Administrador',

            'token' => null
        ]);

        Usuario::create([
            'id' => 2,
            'email' => 'miguelads@gmail.com',
            'password' => 'e516f979536994a14d9b0500bca3a1287b9ea9fe',
            'nombre' => 'Miguél Alejandro Dolores Saucedo',
            'sexo' => 'H',
            'fecha_nacimiento' => '1996-07-20',
            'tipo_usuario' => 'UsuarioNormal',
            'token' => null
        ]);

        Usuario::create([
            'id' => 3,
            'email' => 'haro@gmail.com',
            'password' => 'e516f979536994a14d9b0500bca3a1287b9ea9fe',
            'nombre' => 'Manuel Haro Pérez',
            'sexo' => 'H',
            'fecha_nacimiento' => '1995-06-19',
            'tipo_usuario' => 'DueñoNegocio',
            'token' => null
        ]);

        Usuario::create([
            'id' => 4,
            'email' => 'daniel@gmail.com',
            'password' => 'e516f979536994a14d9b0500bca3a1287b9ea9fe',
            'nombre' => 'Daniel Morales Reyes',
            'sexo' => 'H',
            'fecha_nacimiento' => '1994-05-18',
            'tipo_usuario' => 'DueñoNegocio',
            'token' => null
        ]);
    }
}
