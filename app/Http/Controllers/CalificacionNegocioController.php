<?php

namespace App\Http\Controllers;

use App\CalificacionNegocio;
use App\Http\Controllers\ResponseUtils;
use App\Http\Validators\NegocioExistente;
use App\Http\Validators\UsuarioExistente;
use App\Negocio;
use Egulias\EmailValidator\Exception\ExpectingCTEXT;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;
use Validator;
use Illuminate\Support\Facades\DB;

class CalificacionNegocioController extends Controller
{
    public function calificarNegocio(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usuario_id' => ['required', 'numeric', new UsuarioExistente],
            'negocio_id' => ['required', 'numeric', new NegocioExistente],
            'calificacion' => ['required', 'numeric'],
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $usuario_id = $request['usuario_id'];
        $negocio_id = $request['negocio_id'];

        $calificacion = CalificacionNegocio::where(
            'negocio_id', '=', $negocio_id)
            ->where('usuario_id', '=', $usuario_id)
            ->first();

        if (!$calificacion) {
            $calificacion = new CalificacionNegocio();
        }

        $calificacion->negocio_id = $request['negocio_id'];
        $calificacion->usuario_id = $request['usuario_id'];
        $calificacion->calificacion = $request['calificacion'];

        try {
            $calificacion->save();

            return ResponseUtils::jsonResponse(200, [
                'calificacion' =>
                    CalificacionNegocioController::getCalificacionNegocio(
                        $negocio_id)
            ]);
        } catch (Exception $e) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => [$e]
            ]);
        }
    }

    /**
     * Obtiene la calificación de un negocio
     */
    public static function getCalificacionNegocio($idNegocio)
    {
        $calificacionSql = "SELECT SUM(cl.calificacion) / " .
            "COUNT(cl.negocio_id) calificacion FROM calificacion_negocio " .
            "cl WHERE cl.negocio_id = " . $idNegocio . ";";

        $calificacion = DB::select(DB::raw($calificacionSql));

        return $calificacion[0]->calificacion;
    }
}
