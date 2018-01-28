<?php

namespace App\Http\Controllers;

use App\Negocio;
use App\ComentarioNegocio;
use Illuminate\Http\Request;
use Monolog\Processor\UidProcessor;
use Validator;

class NegocioController extends Controller
{
    /**
     * Obtiene el catálogo de los negocios dados de alta con la finalidad de
     * administrarlos
     */
    public function getCatalogoNegocios(Request $request)
    {
        // TODO Implementar la lógica de la petición

        $negociosExistentesResponse = ResponseUtils::jsonResponse(200, [
            [
                'id' => 1,
                'nombre' => 'Macdonnals',
                'url_logo' => 'logos/logo_1.png',
                'tipo_suscripcion' => 'Premium',
                'fecha_fin_suscripcion' => '2017-12-01'
            ],
            [
                'id' => 2,
                'nombre' => 'KFC',
                'url_logo' => 'logos/logo_1.png',
                'tipo_suscripcion' => 'Básica',
                'fecha_fin_suscripcion' => '2017-12-31'
            ]
        ]);

        $negociosInexistentesReponse = ResponseUtils::jsonResponse(200, []);

        return $negociosExistentesResponse;
//        return $negociosInexistentesReponse;
    }

    /**
     * Registra un nuevo negocio
     */
    public function registrarNegocio(Request $request)
    {
        // Parámetros obligatorios
        $nombre = $request['nombre'];
        $latitud = $request['latitud'];
        $longitud = $request['longitud'];
        $descripcion_breve = $request['descripcion_breve'];
        $descripcion_completa = $request['descripcion_completa'];
        $categoria_negocio_id = $request['categoria_negocio_id'];
        $palabras_clave = $request['palabras_clave'];

        // Parámetros opcionales
        $sitio_web = $request['sitio_web'];
        $facebook = $request['facebook'];

        if (!ResponseUtils::isRequiredParametersComplete([$nombre, $latitud,
            $longitud, $descripcion_breve, $descripcion_completa,
            $categoria_negocio_id, $palabras_clave])) {
            return ResponseUtils::parametrosIncompletosResponse(['nombre', 'latitud',
                'longitud', 'descripcion_breve', 'descripcion_completa',
                'categoria_negocio_id', 'palabras_clave']);
        }

        // TODO Implementar la lógica de la petición
        // Nombre logo '/uploads/' . sha1('logo_negocio' . $negocio->id)

        $negocioRegistradoResponse = ResponseUtils::jsonResponse(200, [
            'id' => 3,
            'nombre' => 'Tacos la parrilla',
            'url_logo' => 'logos/logo_3.png',
            'tipo_suscripcion' => 'Básica',
            'fecha_fin_suscripcion' => '31/12/2017'
        ]);

        return $negocioRegistradoResponse;
//        return ResponseUtils::categoriaInexistenteResponse();
    }

    /**
     * Actualiza un negocio existente
     */
    public function actualizarNegocio(Request $request)
    {
        // Parámetros obligatorios
        $id = $request['id'];

        // Parámetros opcionales
        $sitio_web = $request['sitio_web'];
        $facebook = $request['facebook'];
        $nombre = $request['nombre'];
        $latitud = $request['latitud'];
        $longitud = $request['longitud'];
        $descripcion_breve = $request['descripcion_breve'];
        $descripcion_completa = $request['descripcion_completa'];
        $categoria_negocio_id = $request['categoria_negocio_id'];
        $palabras_clave = $request['palabras_clave'];

        if (!ResponseUtils::isRequiredParametersComplete([$id])) {
            return ResponseUtils::parametrosIncompletosResponse(['id']);
        }

        // TODO Implementar la lógica de la petición

        $negocioActualizadoResponse = ResponseUtils::jsonResponse(200, [
            'id' => $id,
            'nombre' => 'Tacos la parrilla',
            'url_logo' => 'logos/logo_3.png',
            'tipo_suscripcion' => 'Básica',
            'fecha_fin_suscripcion' => '31/12/2017'
        ]);

        return $negocioActualizadoResponse;
//        return ResponseUtils::categoriaInexistenteResponse();
//        return ResponseUtils::negocioInexistenteResponse();
    }

    /**
     * Elimina un negocio existente
     */
    public function eliminarNegocio(Request $request)
    {
        $id = $request['id'];

        if (!ResponseUtils::isRequiredParametersComplete([$id])) {
            return ResponseUtils::parametrosIncompletosResponse(['id']);
        }

        // TODO Implementar la lógica de la petición

        $negocioEliminadoResponse = ResponseUtils::jsonResponse(200, [
            'id' => $id
        ]);

        return $negocioEliminadoResponse;
//        return ResponseUtils::negocioInexistenteResponse();
    }

    /**
     * Obtiene los detalles de un negocio
     */
    public function detallesNegocio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_negocio' => 'required|numeric',
        ]);

        if ($validator->passes()) {

        } else {
            return ResponseUtils::jsonResponse(400, [
                'error' => $validator->errors()->all()
            ]);
        }

        $id_negocio = $request['id_negocio'];

        if (!ResponseUtils::isRequiredParametersComplete([$id_negocio])) {
            return ResponseUtils::parametrosIncompletosResponse(['id_negocio']);
        }

        $detallesResponse = ResponseUtils::jsonResponse(200, [
            'nombre' => 'Macdonnals',
            'logotipo' => '/logos/customer-service.png',
            'categoria' => 'Comida',
            'calificacion' => 3.8,
            'sitio_web' => 'http://macdonnals.com',
            'latitud' => 100.24232,
            'longitud' => 100.43243,
            'galeria' => [
                '/galeria/kfc_01.jpg',
                '/galeria/kfc_02.jpg',
                '/galeria/kfc_03.jpg'
            ],
            'descripcion_breve' => 'Un establecimiento muy cool',
            'descripcion_completa' => [
                'descripcion' => [
                    'tipo' => 'texto',
                    'titulo' => 'Descripción',
                    'contenido' => 'McDonald\'s es una cadena de restaurantes de rápida. Sus principales productos son las hamburguesas, papas fritas, los menús para el desayuno, los refrescos, batidos, los helados, los postres y, recientemente, ensaladas de fruta y otros productos exclusivos para países.'
                ],
                'productos' => [
                    'tipo' => 'lista',
                    'titulo' => 'Productos',
                    'contenido' => [
                        'Hamburguesas',
                        'Burritos',
                        'Hot Dogs'
                    ]
                ],
                'horario' => [
                    'tipo' => 'lista',
                    'titulo' => 'Horario',
                    'contenido' => [
                        'Lunes a viernes de 2:00 pm a 4:00 pm',
                        'Sábados de 2:00 pm a 4:00 pm y de 6:00 pm a 2:00 am',
                        'Domingos cerrado'
                    ]
                ],
                'telefono' => [
                    'tipo' => 'lista',
                    'titulo' => 'Teléfono',
                    'contenido' => [
                        '4949428610',
                        '4949428611',
                        '4949428612'
                    ]
                ]
            ],
            'palabras_clave' => [
                'comida',
                'hamburguesas',
                'chatarra'
            ],
            'comentarios' => [
                [
                    'fecha' => '12/09/2017',
                    'autor' => 'Martin López Pereira',
                    'comentario' => 'Un establecimiento muy higiénico',
                    'autor_foto' => '/usuarios/usuario_01.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo',
                    'autor_foto' => '/usuarios/usuario_02.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo',
                    'autor_foto' => '/usuarios/usuario_03.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo',
                    'autor_foto' => '/usuarios/usuario_04.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo, nunca jamás volveré a utilizar sus servicios',
                    'autor_foto' => '/usuarios/usuario_05.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo, nunca jamás volveré a utilizar sus servicios',
                    'autor_foto' => '/usuarios/usuario_05.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo, nunca jamás volveré a utilizar sus servicios',
                    'autor_foto' => '/usuarios/usuario_05.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo, nunca jamás volveré a utilizar sus servicios',
                    'autor_foto' => '/usuarios/usuario_05.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo, nunca jamás volveré a utilizar sus servicios',
                    'autor_foto' => '/usuarios/usuario_05.jpg'
                ]
            ]

        ]);

        return $detallesResponse;
//        return ResponseUtils::negocioInexistenteResponse();
    }

}