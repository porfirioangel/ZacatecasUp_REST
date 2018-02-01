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
            'profile_photo' => '/uploads/07626f51fda67ba39daebc72e1c933f1283f5a75',
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
            'profile_photo' => '/uploads/2a245ea2cade1819c3f3cf3803c4ea015793d5bb',
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
            'profile_photo' => '/uploads/8cdb9abc54ad2e233ee9ec7c13aa522308218d54',
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
            'profile_photo' => '/uploads/d6774e726178efd4c37fa58b5a0201e04c45a358',
            'token' => null
        ]);
    }
}
