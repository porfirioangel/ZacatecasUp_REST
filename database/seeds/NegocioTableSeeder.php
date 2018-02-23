<?php

use App\Negocio;
use Illuminate\Database\Seeder;

class NegocioTableSeeder extends Seeder
{
    private $oxxoDescription = [
        'descripción' => [
            'tipo' => 'texto',
            'titulo' => 'Descripción',
            'contenido' => 'En OXXO todo lo encuentras en un mismo lugar, ' .
                'tienes productos de abarrotes, bebidas, comida  y muchas ' .
                'cosas maś'
        ],
        'productos' => [
            'tipo' => 'lista',
            'titulo' => 'productos',
            'contenido' => ['Sabritas', 'Café', 'Bikingos', 'Tecate']
        ]
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Negocio::create([
            'id' => 1,
            'nombre' => 'OXXO',
            'latitud' => 22.65359700,
            'longitud' => -102.98385660,
            'descripcion_breve' => 'Encuentras lo que quieras',
            'descripcion_completa' => '{"descripcion": {"tipo": "texto","titulo": "Descripción","contenido": "McDonald\'s es una cadena de restaurantes de rápida. Sus principales productos son las hamburguesas, papas fritas, los menús para el desayuno, los refrescos, batidos, los helados, los postres y, recientemente, ensaladas de fruta y otros productos exclusivos para países."},"productos": {"tipo": "lista","titulo": "Productos","contenido": ["Hamburguesas","Burritos","Hot Dogs"]},"horario": {"tipo": "lista","titulo": "Horario","contenido": ["Lunes a viernes de 2:00 pm a 4:00 pm","Sábados de 2:00 pm a 4:00 pm y de 6:00 pm a 2:00 am","Domingos cerrado"]},"telefono": {"tipo": "lista","titulo": "Teléfono","contenido": ["4949428610","4949428611","4949428612"]}}',
            'url_logo' =>  '/uploads/' . sha1('logo_negocio' . 1),
            'sitio_web' => 'http://www.oxxo.com',
            'facebook' => 'https://www.facebook.com/oxxo',
            'categoria_negocio_id' => 1,
            'suscripcion_id' => 1
        ]);

        Negocio::create([
            'id' => 2,
            'nombre' => 'McDonald\'s',
            'latitud' => 22.77360900,
            'longitud' => -102.57613690,
            'descripcion_breve' => 'Comida rápida exquisita',
            'descripcion_completa' => '{"descripcion": {"tipo": "texto","titulo": "Descripción","contenido": "McDonald\'s es una cadena de restaurantes de rápida. Sus principales productos son las hamburguesas, papas fritas, los menús para el desayuno, los refrescos, batidos, los helados, los postres y, recientemente, ensaladas de fruta y otros productos exclusivos para países."},"productos": {"tipo": "lista","titulo": "Productos","contenido": ["Hamburguesas","Burritos","Hot Dogs"]},"horario": {"tipo": "lista","titulo": "Horario","contenido": ["Lunes a viernes de 2:00 pm a 4:00 pm","Sábados de 2:00 pm a 4:00 pm y de 6:00 pm a 2:00 am","Domingos cerrado"]},"telefono": {"tipo": "lista","titulo": "Teléfono","contenido": ["4949428610","4949428611","4949428612"]}}',
            'url_logo' => '/uploads/' . sha1('logo_negocio' . 2),
            'sitio_web' => 'http://www.macdonalds.com',
            'facebook' => 'https://www.facebook.com/macdonalds',
            'categoria_negocio_id' => 2,
            'suscripcion_id' => 2
        ]);

        Negocio::create([
            'id' => 3,
            'nombre' => 'Aurrera',
            'latitud' => 22.77360900,
            'longitud' => -102.57613690,
            'descripcion_breve' => 'La campeona de los precios bajos',
            'descripcion_completa' => '{"descripcion": {"tipo": "texto","titulo": "Descripción","contenido": "McDonald\'s es una cadena de restaurantes de rápida. Sus principales productos son las hamburguesas, papas fritas, los menús para el desayuno, los refrescos, batidos, los helados, los postres y, recientemente, ensaladas de fruta y otros productos exclusivos para países."},"productos": {"tipo": "lista","titulo": "Productos","contenido": ["Hamburguesas","Burritos","Hot Dogs"]},"horario": {"tipo": "lista","titulo": "Horario","contenido": ["Lunes a viernes de 2:00 pm a 4:00 pm","Sábados de 2:00 pm a 4:00 pm y de 6:00 pm a 2:00 am","Domingos cerrado"]},"telefono": {"tipo": "lista","titulo": "Teléfono","contenido": ["4949428610","4949428611","4949428612"]}}',
            'url_logo' => '/uploads/' . sha1('logo_negocio' . 3),
            'sitio_web' => 'http://www.aurrera.com',
            'facebook' => 'https://www.facebook.com/aurrera',
            'categoria_negocio_id' => 2,
            'suscripcion_id' => 2
        ]);
    }


}
