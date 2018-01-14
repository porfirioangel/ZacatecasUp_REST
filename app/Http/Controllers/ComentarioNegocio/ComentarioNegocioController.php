<?php

namespace App\Http\Controllers\ComentarioNegocio;

use App\ComentarioNegocio;
use App\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Utils;
use App\Http\Controllers\Controller;

class ComentarioNegocioController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'usuario_id' => 'required',
            'negocio_id' => 'required',
            'comentario' => 'required'
        ];

        $this->validate($request, $reglas);
        $campos = $request->all();
        $campos['fecha'] = date('d/m/Y h:i a');
//        $comentario = ComentarioNegocio::create($campos);

        $usuario = Usuario::find($campos['usuario_id']);

        return Utils::jsonResponse(200, [
            'fecha' => $campos['fecha'],
            'autor' => $usuario->nombre,
            'comentario' => $campos['comentario'],
            'autor_foto' => $usuario->profile_photo
        ]);

//        return Utils::jsonResponse(200, [
//            'fecha' => $comentario->fecha,
//            'autor' => $usuario->nombre,
//            'comentario' => $comentario->comentario,
//            'autor_foto' => $usuario->profile_photo
//        ]);
    }

//    public function store(Request $request)
//    {
//        $usuario_id = $request['usuario_id'];
//        $negocio_id = $request['negocio_id'];
//        $comentario = $request['comentario'];
//
//        if (!Utils::isRequiredParametersComplete([$usuario_id, $negocio_id,
//            $comentario])) {
//            return Utils::parametrosIncompletosResponse(['usuario_id',
//                'negocio_id', 'comentario']);
//        }
//
//        // TODO Implementar la lógica de la petición
//
//        $comentarioResponse = Utils::jsonResponse(200, [
//            'fecha' => date('d/m/Y h:i a'),
//            'autor' => 'Porfirio Ángel Díaz Sánchez',
//            'comentario' => $comentario
//        ]);
//
//        return $comentarioResponse;
////        return Utils::usuarioInexistenteResponse();
////        return Utils::negocioInexistenteResponse();
//    }

}
