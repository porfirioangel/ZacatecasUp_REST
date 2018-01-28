<?php

namespace App\Http\Controllers\ComentarioNegocio;

use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseUtils;
use App\Http\Controllers\Controller;

class ComentarioNegocioController extends Controller
{
    public function agregarComentario(Request $request)
    {
        $reglas = [
            'usuario_id' => 'required',
            'negocio_id' => 'required',
            'comentario' => 'required'
        ];

        $this->validate($request, $reglas);
        $campos = $request->all();
        $campos['fecha'] = date('d/m/Y h:i a');

        $usuario = Usuario::find($campos['usuario_id']);

        return ResponseUtils::jsonResponse(200, [
            'fecha' => $campos['fecha'],
            'autor' => $usuario->nombre,
            'comentario' => $campos['comentario'],
            'autor_foto' => $usuario->profile_photo
        ]);

//        return ResponseUtils::jsonResponse(200, [
//            'fecha' => $comentario->fecha,
//            'autor' => $usuario->nombre,
//            'comentario' => $comentario->comentario,
//            'autor_foto' => $usuario->profile_photo
//        ]);
    }

}
