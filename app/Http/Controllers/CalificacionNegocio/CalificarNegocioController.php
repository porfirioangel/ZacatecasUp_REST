<?php

namespace App\Http\Controllers\CalificacionNegocio;

use App\Http\Controllers\Utils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalificarNegocioController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usuario_id = $request['id_usuario'];
        $negocio_id = $request['id_negocio'];
        $calificacion = $request['calificacion'];

        if (!Utils::isRequiredParametersComplete([$usuario_id, $negocio_id,
            $calificacion])) {
            return Utils::parametrosIncompletosResponse(['id_usuario',
                'id_negocio', 'calificacion']);
        }

        // TODO Implementar la lógica de la petición

        $calificacionResponse = Utils::jsonResponse(200, [
           'calificacion' => (rand(1, 5) + $calificacion) / 2
        ]);

        return $calificacionResponse;
//        return Utils::usuarioInexistenteResponse();
//        return Utils::negocioInexistenteResponse();
    }
}
