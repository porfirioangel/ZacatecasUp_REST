<?php

namespace App\Http\Controllers\CalificacionNegocio;

use App\Http\Controllers\ResponseUtils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalificacionNegocioController extends Controller
{
    public function calificarNegocio(Request $request)
    {
        $usuario_id = $request['id_usuario'];
        $negocio_id = $request['id_negocio'];
        $calificacion = $request['calificacion'];

        if (!ResponseUtils::isRequiredParametersComplete([$usuario_id, $negocio_id,
            $calificacion])) {
            return ResponseUtils::parametrosIncompletosResponse(['id_usuario',
                'id_negocio', 'calificacion']);
        }

        // TODO Implementar la lógica de la petición

        $calificacionResponse = ResponseUtils::jsonResponse(200, [
            'calificacion' => (rand(1, 5) + $calificacion) / 2
        ]);

        return $calificacionResponse;
//        return ResponseUtils::usuarioInexistenteResponse();
//        return ResponseUtils::negocioInexistenteResponse();
    }
}
