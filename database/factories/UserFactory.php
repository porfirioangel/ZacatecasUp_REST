<?php

use App\negocio;
use App\usuario;
use App\suscripcion;
use App\palabra_clave;
use App\galeria_negocio;
use App\etiqueta_negocio;
use App\telefono_negocio;
use App\categoria_negocio;
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
$factory->define(usuario::class, function (Faker $faker) {
    return [
        'negocio_id' => negocio::all()->random()->id,
        'palabra_clave_id' => negocio::all()->random()->id,        
    ];
});

$factory->define(categoria_negocio::class, function (Faker $faker) {
    return [
        'categoria' => $faker->word,
        'ionicon' => $faker->word,
    ];
});
$factory->define(suscripcion::class, function (Faker $faker) {
    return [
        'tipo' => $faker->word,
        'fecha_inicio' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'fecha_fin' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
$factory->define(negocio::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
        'latitud' => $faker->latitude($min = -90, $max = 90),
        'longitud' => $faker->longitude($min = -180, $max = 180),
        'descripcion_breve' => $faker -> paragraph(1),
        'descripcion_completa' => $faker -> paragraph(1),
        'url_logo' => $faker ->url, 
        'sitio_web' => $faker ->url, 
        'facebook' => $faker ->url, 
        'categoria_negocio_id' => categoria_negocio::all()->random()->id,
        'suscripcion_id' => suscripcion::all()->random()->id,
    ];
});
$factory->define(galeria_negocio::class, function (Faker $faker) {
    return [
        'url_foto' => $faker->url,
        'negocio_id' => negocio::all()->random()->id,        
    ];
});
$factory->define(telefono_negocio::class, function (Faker $faker) {
    return [
        'telefono' => $faker->tollFreePhoneNumber,
        'negocio_id' => negocio::all()->random()->id,        
    ];
});
$factory->define(palabra_clave::class, function (Faker $faker) {
    return [        
        'keyword' => $faker->word,        
    ];
});
$factory->define(etiqueta_negocio::class, function (Faker $faker) {
    return [
        'negocio_id' => negocio::all()->random()->id,
        'palabra_clave_id' => palabra_clave::all()->random()->id,        
    ];
});