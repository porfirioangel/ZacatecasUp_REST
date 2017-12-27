<?php

use App\Negocio;
use App\usuario;
use App\Suscripcion;
use App\PalabraClave;
use App\GaleriaNegocio;
use App\EtiquetaNegocio;
use App\CategoriaNegocio;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Usuario::class, function (Faker $faker) {
    return [
        'negocio_id' => Negocio::all()->random()->id,
        'palabra_clave_id' => Negocio::all()->random()->id,
    ];
});

$factory->define(CategoriaNegocio::class, function (Faker $faker) {
    return [
        'categoria' => ucfirst($faker->word) . ' ' . $faker->word
    ];
});

$factory->define(Suscripcion::class, function (Faker $faker) {
    return [
        'tipo' => $faker->word,
        'fecha_inicio' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'fecha_fin' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});

$factory->define(Negocio::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
        'latitud' => $faker->latitude($min = -90, $max = 90),
        'longitud' => $faker->longitude($min = -180, $max = 180),
        'descripcion_breve' => $faker->paragraph(1),
        'descripcion_completa' => $faker->paragraph(1),
        'url_logo' => $faker->url,
        'sitio_web' => $faker->url,
        'facebook' => $faker->url,
        'categoria_negocio_id' => CategoriaNegocio::all()->random()->id,
        'suscripcion_id' => Suscripcion::all()->random()->id,
    ];
});

$factory->define(GaleriaNegocio::class, function (Faker $faker) {
    return [
        'url_foto' => $faker->url,
        'negocio_id' => Negocio::all()->random()->id,
    ];
});

$factory->define(PalabraClave::class, function (Faker $faker) {
    return [
        'keyword' => $faker->word,
    ];
});

$factory->define(EtiquetaNegocio::class, function (Faker $faker) {
    return [
        'negocio_id' => Negocio::all()->random()->id,
        'palabra_clave_id' => PalabraClave::all()->random()->id,
    ];
});