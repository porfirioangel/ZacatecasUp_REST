<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Monolog\Processor\UidProcessor;

class NegocioController extends Controller
{
    public function getCatalogoNegocios(Request $request)
    {
        // TODO Implementar la lógica de la petición

        $negociosExistentesResponse = Utils::jsonResponse(200, [
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

        $negociosInexistentesReponse = Utils::jsonResponse(200, []);

        return $negociosExistentesResponse;
//        return $negociosInexistentesReponse;
    }

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

        if (!Utils::isRequiredParametersComplete([$nombre, $latitud,
            $longitud, $descripcion_breve, $descripcion_completa,
            $categoria_negocio_id, $palabras_clave])) {
            return Utils::parametrosIncompletosResponse(['nombre', 'latitud',
                'longitud', 'descripcion_breve', 'descripcion_completa',
                'categoria_negocio_id', 'palabras_clave']);
        }

        // TODO Implementar la lógica de la petición

        $negocioRegistradoResponse = Utils::jsonResponse(200, [
            'id' => 3,
            'nombre' => 'Tacos la parrilla',
            'url_logo' => 'logos/logo_3.png',
            'tipo_suscripcion' => 'Básica',
            'fecha_fin_suscripcion' => '31/12/2017'
        ]);

        return $negocioRegistradoResponse;
//        return Utils::categoriaInexistenteResponse();
    }

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

        if (!Utils::isRequiredParametersComplete([$id])) {
            return Utils::parametrosIncompletosResponse(['id']);
        }

        // TODO Implementar la lógica de la petición

        $negocioActualizadoResponse = Utils::jsonResponse(200, [
            'id' => $id,
            'nombre' => 'Tacos la parrilla',
            'url_logo' => 'logos/logo_3.png',
            'tipo_suscripcion' => 'Básica',
            'fecha_fin_suscripcion' => '31/12/2017'
        ]);

        return $negocioActualizadoResponse;
//        return Utils::categoriaInexistenteResponse();
//        return Utils::negocioInexistenteResponse();
    }

    public function eliminarNegocio(Request $request)
    {
        $id = $request['id'];

        if (!Utils::isRequiredParametersComplete([$id])) {
            return Utils::parametrosIncompletosResponse(['id']);
        }

        // TODO Implementar la lógica de la petición

        $negocioEliminadoResponse = Utils::jsonResponse(200, [
            'id' => $id
        ]);

        return $negocioEliminadoResponse;
//        return Utils::negocioInexistenteResponse();
    }

    public function actualizarSuscripcion(Request $request)
    {
        $id_negocio = $request['id_negocio'];
        $fecha_fin = $request['fecha_fin'];
        $tipo = $request['tipo'];

        if (!Utils::isRequiredParametersComplete([$id_negocio, $fecha_fin,
            $tipo])) {
            return Utils::parametrosIncompletosResponse(['id_negocio',
                'fecha_fin', 'tipo']);
        }

        // TODO Implementar la lógica de la petición

        $suscripcionActualizadaResponse = Utils::jsonResponse(200, [
            'id_negocio' => $id_negocio,
            'fecha_fin' => $fecha_fin,
            'tipo' => $tipo
        ]);

//        return $suscripcionActualizadaResponse;
        return Utils::negocioInexistenteResponse();
    }

    public function agregarPropietario(Request $request)
    {
        $id_negocio = $request['id_negocio'];
        $id_usuario = $request['id_usuario'];

        if (!Utils::isRequiredParametersComplete([$id_negocio, $id_usuario])) {
            return Utils::parametrosIncompletosResponse(['id_negocio',
                'id_usuario']);
        }

        // TODO Implementar la lógica de la petición

        $duenoAgregadoResponse = Utils::jsonResponse(200, [
            'id_asignacion' => 1,
            'id_negocio' => $id_negocio,
            'id_usuario' => $id_usuario,
            'nombre_usuario' => 'Porfirio Ángel Díaz Sánchez',
        ]);

        return $duenoAgregadoResponse;
//        return Utils::negocioInexistenteResponse();
//        return Utils::usuarioInexistenteResponse();
    }

    public function removerPropietario(Request $request)
    {
        $id_negocio = $request['id_negocio'];
        $id_usuario = $request['id_usuario'];

        if (!Utils::isRequiredParametersComplete([$id_negocio, $id_usuario])) {
            return Utils::parametrosIncompletosResponse(['id_negocio',
                'id_usuario']);
        }

        // TODO Implementar la lógica de la petición

        $duenoRemovidoReponse = Utils::jsonResponse(200, [
            'id_asignacion' => 1
        ]);

        return $duenoRemovidoReponse;
//        return Utils::negocioInexistenteResponse();
//        return Utils::usuarioInexistenteResponse();
    }

    public function listarPropietarios(Request $request)
    {
        $id_negocio = $request['id_negocio'];

        if (!Utils::isRequiredParametersComplete([$id_negocio])) {
            return Utils::parametrosIncompletosResponse(['id_negocio']);
        }

        // TODO Implementar la lógica de la petición

        $propietariosResponse = Utils::jsonResponse(200, [
            [
                'id' => 1,
                'nombre' => 'Porfirio Ángel Díaz Sánchez'
            ],
            [
                'id' => 2,
                'nombre' => 'Porfirio Ángel Díaz Sánchez'
            ]
        ]);

        return $propietariosResponse;
//        return Utils::jsonResponse(200, []);
//        return Utils::negocioInexistenteResponse();
    }

    public function detallesNegocio(Request $request)
    {
        $id_negocio = $request['id_negocio'];

        if (!Utils::isRequiredParametersComplete([$id_negocio])) {
            return Utils::parametrosIncompletosResponse(['id_negocio']);
        }

        $detallesResponse = Utils::jsonResponse(200, [
            'nombre' => 'Macdonnals',
            'logotipo' => '/ZacatecasUp/logos/customer-service.png',
            'categoria' => 'Comida',
            'calificacion' => 3.8,
            'sitio_web' => 'http://macdonnals.com',
            'latitud' => 100.24232,
            'longitud' => 100.43243,
            'galeria' => [
                '/ZacatecasUp/galeria/kfc_01.jpg',
                '/ZacatecasUp/galeria/kfc_02.jpg',
                '/ZacatecasUp/galeria/kfc_03.jpg'
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
                    'autor_foto' => '/ZacatecasUp/usuarios/usuario_01.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo',
                    'autor_foto' => '/ZacatecasUp/usuarios/usuario_02.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo',
                    'autor_foto' => '/ZacatecasUp/usuarios/usuario_03.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo',
                    'autor_foto' => '/ZacatecasUp/usuarios/usuario_04.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo, nunca jamás volveré a utilizar sus servicios',
                    'autor_foto' => '/ZacatecasUp/usuarios/usuario_05.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo, nunca jamás volveré a utilizar sus servicios',
                    'autor_foto' => '/ZacatecasUp/usuarios/usuario_05.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo, nunca jamás volveré a utilizar sus servicios',
                    'autor_foto' => '/ZacatecasUp/usuarios/usuario_05.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo, nunca jamás volveré a utilizar sus servicios',
                    'autor_foto' => '/ZacatecasUp/usuarios/usuario_05.jpg'
                ],
                [
                    'fecha' => '11/09/2017',
                    'autor' => 'Porfirio López Pereira',
                    'comentario' => 'Un establecimiento muy feo, nunca jamás volveré a utilizar sus servicios',
                    'autor_foto' => '/ZacatecasUp/usuarios/usuario_05.jpg'
                ]
            ]

        ]);

        return $detallesResponse;
//        return Utils::negocioInexistenteResponse();
    }
}