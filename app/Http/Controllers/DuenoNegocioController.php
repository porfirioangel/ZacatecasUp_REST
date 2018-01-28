<?php

namespace App\Http\Controllers\DuenoNegocio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DuenoNegocioController extends Controller
{
    public function agregarDueno(Request $request)
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
//        return ResponseUtils::negocioInexistenteResponse();
//        return ResponseUtils::usuarioInexistenteResponse();
    }

    public function removerDueno(Request $request)
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
//        return ResponseUtils::negocioInexistenteResponse();
//        return ResponseUtils::usuarioInexistenteResponse();
    }

    public function listarDuenos(Request $request)
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
//        return ResponseUtils::jsonResponse(200, []);
//        return ResponseUtils::negocioInexistenteResponse();
    }
}
