<?php

namespace App\Http\Controllers\Suscripcion;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SuscripcionController extends Controller
{
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
}
