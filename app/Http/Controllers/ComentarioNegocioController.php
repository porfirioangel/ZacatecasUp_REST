<?php

namespace App\Http\Controllers;

use App\ComentarioNegocio;
use App\Http\Validators\ComentarioNegocioExistente;
use App\Http\Validators\NegocioExistente;
use App\Http\Validators\UsuarioExistente;
use App\Negocio;
use App\Usuario;
use DateTime;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;

class ComentarioNegocioController extends Controller
{
    public function agregarComentario(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'usuario_id' => ['required', 'numeric', new UsuarioExistente],
            'negocio_id' => ['required', 'numeric', new NegocioExistente],
            'comentario' => ['required']
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $campos = $request->all();
        $campos['fecha'] = new DateTime();

        $comentario = ComentarioNegocio::create($campos);

        $usuario = Usuario::find($campos['usuario_id']);

        return ResponseUtils::jsonResponse(200, [
            'fecha' => $comentario->fecha->format('d/m/Y h:i a'),
            'autor' => $usuario->nombre,
            'comentario' => $campos['comentario'],
            'autor_foto' => $usuario->profile_photo
        ]);
    }

    public function obtenerComentarios(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'negocio_id' => ['required', 'numeric', new NegocioExistente],
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $negocio = Negocio::find($request['negocio_id']);

        $comentarios = DB::table('comentario_negocio as cm')
            ->join('usuario as u', 'u.id', '=', 'cm.usuario_id')
            ->where('negocio_id', '=', $negocio->id)
            ->select('cm.id', 'cm.fecha', 'cm.comentario', 'u.nombre as autor',
                'u.profile_photo as autor_foto')
            ->orderBy('cm.fecha', 'desc')
            ->get();

        foreach ($comentarios as $comentario) {
            $date = new DateTime($comentario->fecha);
            $comentario->fecha = $date->format('d/m/Y h:i a');
        }

        return ResponseUtils::jsonResponse(200, $comentarios);
    }

    public function eliminarComentario(Request $request) {
        $validator = Validator::make($request->all(), [
            'id_comentario' => ['required', 'numeric', new
            ComentarioNegocioExistente]
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $comentario = ComentarioNegocio::find($request['id_comentario']);

        try {
            $comentario->delete();
            return ResponseUtils::jsonResponse(200, $comentario);
        } catch (\Exception $e) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => [$e->getMessage()]
            ]);
        }
    }
}
