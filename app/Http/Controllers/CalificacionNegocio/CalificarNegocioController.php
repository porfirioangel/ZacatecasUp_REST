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
        $usuario_id = $request['usuario_id'];
        $negocio_id = $request['negocio_id'];
        $calificacion = $request['calificacion'];

        if (!Utils::isRequiredParametersComplete([$usuario_id, $negocio_id,
            $calificacion])) {
            return Utils::parametrosIncompletosResponse(['usuario_id',
                'negocio_id', 'calificacion']);
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
