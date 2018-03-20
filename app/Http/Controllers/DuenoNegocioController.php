<?php

namespace App\Http\Controllers;

use App\DuenoNegocio;
use App\Http\Controllers\ResponseUtils;
use App\Http\Validators\NegocioExistente;
use App\Http\Validators\UsuarioExistente;
use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Validator;

class DuenoNegocioController extends Controller
{
    public function agregarDueno(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_negocio' => ['required', 'numeric', new NegocioExistente],
            'id_usuario' => ['required', 'numeric', new UsuarioExistente]
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $id_negocio = $request['id_negocio'];
        $id_usuario = $request['id_usuario'];

        $asignacion = DuenoNegocio::where('negocio_id', '=', $id_negocio)
            ->where('usuario_id', '=', $id_usuario)
            ->get()
            ->first();

        if (!$asignacion) {
            $asignacion = new DuenoNegocio();
            $asignacion->usuario_id = $id_usuario;
            $asignacion->negocio_id = $id_negocio;

            try {
                $asignacion->save();
            } catch (\Exception $e) {
                return ResponseUtils::jsonResponse(400, [
                    'errors' => [$e]
                ]);
            }
        }

        $usuario = Usuario::find($asignacion->usuario_id);

        return ResponseUtils::jsonResponse(200, [
            'id_negocio' => $asignacion->negocio_id,
            'id_usuario' => $asignacion->usuario_id,
            'nombre_usuario' => $usuario->nombre,
        ]);
    }

    public function removerDueno(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_negocio' => ['required', 'numeric', new NegocioExistente],
            'id_usuario' => ['required', 'numeric', new UsuarioExistente]
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $id_negocio = $request['id_negocio'];
        $id_usuario = $request['id_usuario'];

        $asignacion = DuenoNegocio::where('negocio_id', '=', $id_negocio)
            ->where('usuario_id', '=', $id_usuario)
            ->get()
            ->first();

        if ($asignacion) {
            $asignacion->delete();
            return ResponseUtils::jsonResponse(200, [
                'message' => 'La asignación de dueño fue removida'
            ]);
        }

        return ResponseUtils::jsonResponse(200, [
            'message' => 'La asignación de dueño no existía'
        ]);
    }

    public function listarDuenos(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_negocio' => ['required', 'numeric', new NegocioExistente]
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $id_negocio = $request['id_negocio'];

        $propietarios = DB::table('usuario as u')
            ->join('dueno_negocio as dn', 'dn.usuario_id', '=', 'u.id')
            ->where('dn.negocio_id', '=', $id_negocio)
            ->select(['u.id', 'u.nombre'])
            ->get();

        return ResponseUtils::jsonResponse(200, $propietarios);
    }
}
