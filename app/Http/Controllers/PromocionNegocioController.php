<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Validators\NegocioExistente;
use Validator;

class PromocionNegocioController extends Controller
{
    public function obtenerPromociones(Request $request) {
        $validator = Validator::make($request->all(), [
            'negocio_id' => ['required', 'numeric', new NegocioExistente()],
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
