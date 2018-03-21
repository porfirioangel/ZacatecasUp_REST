<?php

use Illuminate\Database\Seeder;
use App\Evento;

class EventoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Evento::create([
            'id' => 1,
            'nombre' => 'El Pequeño Quijote',
            'fecha' => '2018-03-25 17:00:00',
            'latitud' => '22.7680109',
            'longitud' => '-102.5611121',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/e31793e0b8f95ba35bfebf3348c1ba26f5415c1d',
            'categoria_evento_id' => 2
        ]);

        Evento::create([
            'id' => 2,
            'nombre' => 'Grupo Universitario de Jazz',
            'fecha' => '2018-03-25 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/6b1fe60e6b154a38ace60a01595874177309c278',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 3,
            'nombre' => 'Sacromonte',
            'fecha' => '2018-03-25 19:00:00',
            'latitud' => '22.775195',
            'longitud' => '-102.5809887',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/44fa3f6ec976435d4bb19824851d087e9447a80d',
            'categoria_evento_id' => 3
        ]);

        Evento::create([
            'id' => 4,
            'nombre' => 'Juan Pablo Vega',
            'fecha' => '2018-03-25 19:00:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/1bb8d22b84bfa0984d76638b9fd06c2fe61e800b',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 5,
            'nombre' => '¡Lava Dora, Lava!',
            'fecha' => '2018-03-25 19:00:00',
            'latitud' => '22.7680109',
            'longitud' => '-102.5611121',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/9aef14472f51a76ec3dba01785bce505125d6009',
            'categoria_evento_id' => 2
        ]);

        Evento::create([
            'id' => 6,
            'nombre' => '¡Lava Dora, Lava!',
            'fecha' => '2018-03-25 20:30:00',
            'latitud' => '22.7680109',
            'longitud' => '-102.5611121',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/e2696fb32f643ea5cc220a5e2ccdca5ee7b599f9',
            'categoria_evento_id' => 2
        ]);

        Evento::create([
            'id' => 7,
            'nombre' => 'Orquesta Filarmónica de Zacatecas',
            'fecha' => '2018-03-25 20:00:00',
            'latitud' => '22.7751717',
            'longitud' => '-102.5751953',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/63252431dcc5204f8d631ff72c0a55fb2ba983c2',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 8,
            'nombre' => 'Caloncho',
            'fecha' => '2018-03-25 20:30:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/f4a95c5d173c6eaa6bbb3da67adc485f04c6c13b',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 9,
            'nombre' => 'Aghathe Iracema',
            'fecha' => '2018-03-25 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/aea73192c6a4b4ec24566ea7ea6c264af8f72c8b',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 10,
            'nombre' => 'Stabat Mater',
            'fecha' => '2018-03-26 17:00:00',
            'latitud' => '22.775713',
            'longitud' => '-102.5745961',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/f8775cc2818699882090bd1f6f774c712d1a3f10',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 11,
            'nombre' => 'Arquetipo',
            'fecha' => '2018-03-26 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/6a44d5388e2050743793fac8f0ace102054d82ad',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 12,
            'nombre' => 'Moan Blues',
            'fecha' => '2018-03-26 19:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/74a55300cd4a3f9fb82d4eb5345302a274ffc2ef',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 13,
            'nombre' => 'Dios Salve a la Reina, Tributo a Queen',
            'fecha' => '2018-03-26 20:30:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/18a3e1064c8e1518395d0c44517f92c1979e5b2c',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 14,
            'nombre' => 'Karolina Beimcik',
            'fecha' => '2018-03-26 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/9f588503fdea555c36a004c2670c05550a2741a0',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 15,
            'nombre' => 'Chamacos ¡Al Aire!',
            'fecha' => '2018-03-27 17:00:00',
            'latitud' => '22.7680109',
            'longitud' => '-102.5611121',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/6b5d17adde710dbef2c7ff91d5cffe8a1cb20f70',
            'categoria_evento_id' => 2
        ]);

        Evento::create([
            'id' => 16,
            'nombre' => 'Ensamble Aramara',
            'fecha' => '2018-03-27 17:00:00',
            'latitud' => '22.775713',
            'longitud' => '-102.5745961',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/74caebddf43f528277bbae58eb2dd45349bda30b',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 17,
            'nombre' => 'Vocumeri',
            'fecha' => '2018-03-27 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/a71d776e23a326e8137bc6c89def54c2579d9757',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 18,
            'nombre' => 'Al-Andaluz de la UAZ',
            'fecha' => '2018-03-27 19:00:00',
            'latitud' => '22.775195',
            'longitud' => '-102.5809887',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/8af3a1fa0434ee207c87dbd1dcbeee4ec8c8ac0d',
            'categoria_evento_id' => 3
        ]);

        Evento::create([
            'id' => 19,
            'nombre' => 'Radio Cafetal',
            'fecha' => '2018-03-27 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/c259e943f4ae30bd7d5e4dbfc906c5d00dfbfcfd',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 20,
            'nombre' => 'cirque',
            'fecha' => '2018-03-28 17:00:00',
            'latitud' => '22.7680116',
            'longitud' => '-102.554546',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/364f2b437633d0112955aa724749bca423458449',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 21,
            'nombre' => 'Terrorismo Tropical',
            'fecha' => '2018-03-28 17:00:00',
            'latitud' => '22.7680116',
            'longitud' => '-102.554546',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/13fb7533f39f7b8adf036f143fe85f15311ca505',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 22,
            'nombre' => 'Hervivor',
            'fecha' => '2018-03-28 17:00:00',
            'latitud' => '22.7680116',
            'longitud' => '-102.554546',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/d14e377e4a4ce5880c2919b88dbad6a7187c89eb',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 23,
            'nombre' => 'Juan',
            'fecha' => '2018-03-28 17:00:00',
            'latitud' => '22.7680116',
            'longitud' => '-102.554546',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/a6ea2542ae090dc61ccc924a8947ddc798b904b3',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 24,
            'nombre' => 'Coro Santiago de Querétaro',
            'fecha' => '2018-03-28 17:00:00',
            'latitud' => '22.775713',
            'longitud' => '-102.5745961',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/45437aeacba2a3e123194cc4505a8292020fbb54',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 25,
            'nombre' => 'Arista 5',
            'fecha' => '2018-03-28 19:00:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/e4991ea27c0c4e01ed3a59faf76743e5c1c0b2f5',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 26,
            'nombre' => 'Faredanz',
            'fecha' => '2018-03-28 19:00:00',
            'latitud' => '22.775195',
            'longitud' => '-102.5809887',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/a6c0c0a1d65242e7edc2adfe6be3bf6392cf572b',
            'categoria_evento_id' => 3
        ]);

        Evento::create([
            'id' => 27,
            'nombre' => 'Porter',
            'fecha' => '2018-03-28 20:00:00',
            'latitud' => '22.7680116',
            'longitud' => '-102.554546',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/adbeb1b77f0b56df9febf0edf8810f58c7eec9ea',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 28,
            'nombre' => 'Las voces en la Muralla',
            'fecha' => '2018-03-28 20:00:00',
            'latitud' => '22.7751717',
            'longitud' => '-102.5751953',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/129f1172a36e11c2c3156ff848d1701d2252632b',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 29,
            'nombre' => 'Daniel Boaventura',
            'fecha' => '2018-03-28 20:30:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/56d58556922feb9d25962a396e7c7055de98bab0',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 30,
            'nombre' => 'Halket',
            'fecha' => '2018-03-28 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/1a2d501099297e1060b8b8ecb702901a23b7f687',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 31,
            'nombre' => 'Banda Sinfónica del Estado de Zacatecas',
            'fecha' => '2018-03-29 12:00:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/cb4c1135717a5827f7a71f8022f99c6b253a2928',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 32,
            'nombre' => 'Torero',
            'fecha' => '2018-03-29 17:00:00',
            'latitud' => '22.7680116',
            'longitud' => '-102.554546',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/3489b2fa30588a6dd429ff17b6e71d934e681be2',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 33,
            'nombre' => 'Latitudes',
            'fecha' => '2018-03-29 17:00:00',
            'latitud' => '22.7680116',
            'longitud' => '-102.554546',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/38cc29f637a866e84acd26bbb7d9399e9f796df2',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 34,
            'nombre' => 'Enimals',
            'fecha' => '2018-03-29 17:00:00',
            'latitud' => '22.7680116',
            'longitud' => '-102.554546',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/4c8b1f6102bf6382372c1b759c449fde05c13085',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 35,
            'nombre' => 'Archimillonario',
            'fecha' => '2018-03-29 17:00:00',
            'latitud' => '22.7680116',
            'longitud' => '-102.554546',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/d9fb9b5c05b0a7a9ae68c7bf63bed43806d37dc8',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 36,
            'nombre' => 'Andrés Margar',
            'fecha' => '2018-03-29 17:00:00',
            'latitud' => '22.7680116',
            'longitud' => '-102.554546',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/af1b4a8f1b9fd671f1e24c94ae221ccdeb37785c',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 37,
            'nombre' => 'Euterpe Jazz',
            'fecha' => '2018-03-29 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/dd8ed0a6f4be7c7a43b8d88c2e3372a34e349c94',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 38,
            'nombre' => 'Tassarba',
            'fecha' => '2018-03-29 19:00:00',
            'latitud' => '22.775195',
            'longitud' => '-102.5809887',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/a89720e469ec85e693cce3f1220d6ca48c92f92d',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 39,
            'nombre' => 'Orquesta de Cámara del Estado de Zacatecas',
            'fecha' => '2018-03-29 20:00:00',
            'latitud' => '22.7751717',
            'longitud' => '-102.5751953',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/6a94f017577bd7e5c95d65105b6591622257abb3',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 40,
            'nombre' => '1,2 3 Trovando',
            'fecha' => '2018-03-29 20:30:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/7808d98f9be6623b11440c8cf82ebd0ad3fc0133',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 41,
            'nombre' => 'La Manta',
            'fecha' => '2018-03-29 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/2539b11240f3031bc6c2c859af0a4f8ee382fd56',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 42,
            'nombre' => 'Concierto Tawayra',
            'fecha' => '2018-03-31 17:00:00',
            'latitud' => '22.7709988',
            'longitud' => '-102.5744819',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/aa22d98a63e59cbbf4eaa14487c5dda3a6f0914b',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 43,
            'nombre' => 'Concierto Tawayra',
            'fecha' => '2018-04-01 18:00:00',
            'latitud' => '22.7709988',
            'longitud' => '-102.5744819',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/f0ca38c1a15565fa039c6e86b5f9f06133886797',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 44,
            'nombre' => 'Ensamble Latinoamericano',
            'fecha' => '2018-03-31 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/8e48fdcf803e859277b2a7fcba06f30bb9da9d16',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 45,
            'nombre' => 'ensamble de percusiones',
            'fecha' => '2018-03-31 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/d3a204d46de875dcd7073a2a56476f61a4bb946b',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 46,
            'nombre' => 'Mariachi Gama Mil',
            'fecha' => '2018-03-31 18:00:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/3e2107e8dba5cd3333196e176b476a3820f3181d',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 47,
            'nombre' => 'Un hombre, una mujer y un perro',
            'fecha' => '2018-03-31 20:00:00',
            'latitud' => '22.7751717',
            'longitud' => '-102.5751953',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/e8075af2630d2d73204c53754608dc47d5bc717b',
            'categoria_evento_id' => 2
        ]);

        Evento::create([
            'id' => 48,
            'nombre' => 'The Shuffle Demons',
            'fecha' => '2018-03-31 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/4f5f9bca875b7a3ca54f8390ea4f6a68cbdfbf25',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 49,
            'nombre' => 'Ensamble Huayrapamushka',
            'fecha' => '2018-04-01 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/2e9ab0be88dec6ae1649fe65194c5f75bb286eab',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 50,
            'nombre' => 'Sapiens Sapiens Teatro Lab',
            'fecha' => '2018-04-01 19:00:00',
            'latitud' => '22.775195',
            'longitud' => '-102.5809887',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/cb2dc51676d45ac5cd93814f4103bc3991ea5559',
            'categoria_evento_id' => 2
        ]);

        Evento::create([
            'id' => 51,
            'nombre' => 'Rockpack, Las leyendas del rock',
            'fecha' => '2018-04-01 20:30:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/959877d6eeb4ede775c0c3ebd7033981e6af6e86',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 52,
            'nombre' => 'Sureda',
            'fecha' => '2018-04-01 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/601fcc6815c7c1199ead15a4b75ca2886368886c',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 53,
            'nombre' => 'Aarón Escobedo',
            'fecha' => '2018-04-02 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/3c4456de9ed397e25ef75ea08bf642e6c16c9658',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 54,
            'nombre' => 'Pablo Cortés',
            'fecha' => '2018-04-02 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/175da286b71902e79a0ce46d6d2ff88898164ae1',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 55,
            'nombre' => 'Lophophora',
            'fecha' => '2018-04-02 19:00:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/19488f5da1d7f0f9528f704b61cb52dae98531c2',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 56,
            'nombre' => 'Orquesta Sinfónica Juvenil de la Unidad Académica de Artes de la UAZ',
            'fecha' => '2018-04-02 20:00:00',
            'latitud' => '22.7751717',
            'longitud' => '-102.5751953',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/89b01ae5b46e50777a51ef7727412875049ed0cb',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 57,
            'nombre' => 'Pachedub Collective',
            'fecha' => '2018-04-02 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/df6a1a3b44c080ef62965f299adf881238f207c6',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 58,
            'nombre' => 'Los pequeños Cantores de Zacatecas',
            'fecha' => '2018-04-03 18:00:00',
            'latitud' => '22.7680109',
            'longitud' => '-102.5611121',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/2c48b2f149f7efe280815d5840e42eaa7c70608e',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 59,
            'nombre' => 'Amatista',
            'fecha' => '2018-04-03 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/f8d0f04f0210277cb5ec27d26f66053c6f34e256',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 60,
            'nombre' => 'Omar Márquez',
            'fecha' => '2018-04-03 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/a638ab6d28e71e16e05a4ead5ac921562d49823f',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 61,
            'nombre' => 'Garganta de Mezcal',
            'fecha' => '2018-04-03 19:00:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/dd9ab10c41ad2ef761e9476f8ca547e3e09f64fa',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 62,
            'nombre' => 'La Corte de los Milagros',
            'fecha' => '2018-04-03 19:00:00',
            'latitud' => '22.775195',
            'longitud' => '-102.5809887',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/fb0fde1c5cc654eee2081d0217bbf825b619296c',
            'categoria_evento_id' => 2
        ]);

        Evento::create([
            'id' => 63,
            'nombre' => 'María Inés Ochoa - La Rumorosa',
            'fecha' => '2018-04-03 20:30:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/9984c904b3ed0a68fd765277a95a443d4b758878',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 64,
            'nombre' => 'Rotor Proyecto',
            'fecha' => '2018-04-03 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/8440a0cb3b6dc4203b270ac4f99d3d6785417a66',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 65,
            'nombre' => 'Dúo Canto Mío',
            'fecha' => '2018-04-04 18:00:00',
            'latitud' => '22.7680109',
            'longitud' => '-102.5611121',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/f82fea17e768e56dd90a53040ab437fb69f47c33',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 66,
            'nombre' => 'Arturo Rocha',
            'fecha' => '2018-04-04 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/fc61bfbea1cba4d760a302bafebf913a1f4dc325',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 67,
            'nombre' => 'Regina Orozco',
            'fecha' => '2018-04-04 20:30:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/38d7369efc51052b3076acbee9818dd87d15cf97',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 68,
            'nombre' => 'Klezmerson',
            'fecha' => '2018-04-04 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/5f4ed99bbe266bf1d86d6849301839060885be12',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 69,
            'nombre' => 'Sofía & Marcelo',
            'fecha' => '2018-04-05 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/c1e65407feaec40803d7cdd5ce8407ed1f4c8303',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 70,
            'nombre' => 'Artefacto Live',
            'fecha' => '2018-04-05 19:00:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/e39541f56766d7e287332243a63a98e6dcf466e6',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 71,
            'nombre' => 'Laboratorio escénico Le Mat',
            'fecha' => '2018-04-05 19:00:00',
            'latitud' => '22.775195',
            'longitud' => '-102.5809887',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/0f39f22699603457d4ec8c7b6468c157dfbacb8c',
            'categoria_evento_id' => 2
        ]);

        Evento::create([
            'id' => 72,
            'nombre' => 'AÑO MÉXICO COLOMBIA 2017-2018',
            'fecha' => '2018-04-05 20:00:00',
            'latitud' => '22.7751717',
            'longitud' => '-102.5751953',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/7c3a98460fbbe3cc836f118031cc0263b9df4a9a',
            'categoria_evento_id' => 2
        ]);

        Evento::create([
            'id' => 73,
            'nombre' => 'Carla Borghetti & Compañia de Tango Nómada',
            'fecha' => '2018-04-05 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/8ffc349ef7504dab9f0ad6deee524def53da7234',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 74,
            'nombre' => 'Rodrigo Escalante',
            'fecha' => '2018-04-06 18:00:00',
            'latitud' => '22.7738039',
            'longitud' => '-102.5766149',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/ca7848ff54b1722b587eb69af47ae1d4c9709d5f',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 75,
            'nombre' => 'Rani',
            'fecha' => '2018-04-06 19:00:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/39a4dc5175f98350d0cebaee04781385a3e2cd6b',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 76,
            'nombre' => 'Grupo MoMo',
            'fecha' => '2018-04-06 19:00:00',
            'latitud' => '22.775195',
            'longitud' => '-102.5809887',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/9b26b8d457103ac36f28bd36617e3ebc7eab602a',
            'categoria_evento_id' => 2
        ]);

        Evento::create([
            'id' => 77,
            'nombre' => 'Natalia Lafourcade',
            'fecha' => '2018-04-06 20:30:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/697bffb1c8fbf3b0898dfcde783fbb9c4964e67a',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 78,
            'nombre' => 'Fanko',
            'fecha' => '2018-04-06 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/5074cd1a0dafa82015d393bb1bf9e2eafc2dd18d',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 79,
            'nombre' => 'La Ciénega Teatro',
            'fecha' => '2018-04-07 19:00:00',
            'latitud' => '22.775195',
            'longitud' => '-102.5809887',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/ca9f856c274e88a2ea301dee21c26ac83c281d35',
            'categoria_evento_id' => 2
        ]);

        Evento::create([
            'id' => 80,
            'nombre' => 'Los Daniels',
            'fecha' => '2018-04-07 19:00:00',
            'latitud' => '22.7760653',
            'longitud' => '-102.5740353',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/5e262f3e394ee5c042308a0bce3b4a0a1081afda',
            'categoria_evento_id' => 1
        ]);

        Evento::create([
            'id' => 81,
            'nombre' => 'A Shelter In The Desert',
            'fecha' => '2018-04-07 22:00:00',
            'latitud' => '22.7740443',
            'longitud' => '-102.5763689',
            'costo' => 'Gratuito',
            'url_flyer' => '/uploads/10887db32184c94a2263a4b081d488f4a44ea20a',
            'categoria_evento_id' => 1
        ]);
    }
}
