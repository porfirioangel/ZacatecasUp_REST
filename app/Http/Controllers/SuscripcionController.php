<?php

namespace App\Http\Controllers;

use App\Http\Validators\NegocioExistente;
use Illuminate\Http\Request;
use Validator;

class SuscripcionController extends Controller
{
    public function actualizarSuscripcion(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_negocio' => ['required', new NegocioExistente],
            'fecha_fin' => ['required'],
            'tipo' => ['required']
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $id_negocio = $request['id_negocio'];
        $fecha_fin = $request['fecha_fin'];
        $tipo = $request['tipo'];

        // TODO Implementar la lógica de la petición

        $suscripcionActualizadaResponse = ResponseUtils::jsonResponse(200, [
            'id_negocio' => $id_negocio,
            'fecha_fin' => $fecha_fin,
            'tipo' => $tipo
        ]);

        return $suscripcionActualizadaResponse;
//        return ResponseUtils::negocioInexistenteResponse();
    }
}
