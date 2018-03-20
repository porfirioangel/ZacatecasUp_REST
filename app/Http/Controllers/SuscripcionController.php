<?php

namespace App\Http\Controllers;

use App\Http\Validators\NegocioExistente;
use App\Negocio;
use App\Suscripcion;
use DateTime;
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

        $negocio = Negocio::find($id_negocio);

        if($negocio->suscripcion_id) {
            $suscripcion = Suscripcion::find($negocio->suscripcion_id);
        } else {
            $suscripcion = new Suscripcion();
        }

        $date = new DateTime();

        $suscripcion->fecha_inicio = $date->format('Y-m-d');
        $suscripcion->fecha_fin = $fecha_fin;
        $suscripcion->tipo = $tipo;

        try {
            $suscripcion->save();
            $negocio->suscripcion_id = $suscripcion->id;
            $negocio->save();
            return ResponseUtils::jsonResponse(200, [
                'id' => $suscripcion->id,
                'fecha_inicio' => $suscripcion->fecha_inicio,
                'fecha_fin' => $suscripcion->fecha_fin,
                'tipo' => $suscripcion->tipo,
                'id_negocio' => $negocio->id
            ]);
        } catch (\Exception $e) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => [$e]
            ]);
        }
    }
}
