<?php

namespace App\Http\Controllers;

use App\Negocio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Validators\NegocioExistente;
use Validator;
use DateTime;

class PromocionNegocioController extends Controller
{
    public function obtenerPromociones(Request $request) {
        $negocios = DB::table('negocio as n')
            ->join('suscripcion as s', 's.id', '=', 'n.suscripcion_id')
            ->select(['n.id', 'n.nombre', 'n.latitud', 'n.longitud', 'n.url_logo'])
            ->where('s.fecha_fin', '>=', new DateTime())
            ->get();

        $negociosPromociones = [];

        foreach ($negocios as $negocio) {
            $promociones = DB::table('promocion_negocio')
                ->where('negocio_id', '=', $negocio->id)
                ->get();

            if(count($promociones) > 0) {
                $negocio->promociones = $promociones;
                array_push($negociosPromociones, $negocio);
            }
        }

        return ResponseUtils::jsonResponse(200, $negociosPromociones);
    }

    public function obtenerPromocionesNegocio(Request $request) {
        $validator = Validator::make($request->all(), [
            'negocio_id' => ['required', 'numeric', new NegocioExistente],
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $negocio_id = $request['negocio_id'];

        $promociones = DB::table('promocion_negocio')
            ->where('negocio_id', '=', $negocio_id)
            ->get();

        return ResponseUtils::jsonResponse(200, $promociones);
    }
}
