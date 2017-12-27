<?php

namespace App\Http\Controllers\ComentarioNegocio;

use App\Http\Controllers\Utils;
use Illuminate\Http\Request;
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
        $usuario_id = $request['usuario_id'];
        $negocio_id = $request['negocio_id'];
        $comentario = $request['comentario'];

        if (!Utils::isRequiredParametersComplete([$usuario_id, $negocio_id,
            $comentario])) {
            return Utils::parametrosIncompletosResponse(['usuario_id',
                'negocio_id', 'comentario']);
        }

        // TODO Implementar la lógica de la petición

        $comentarioResponse = Utils::jsonResponse(200, [
            'fecha' => date('Y-m-d h:i:s a'),
            'autor' => 'Porfirio Ángel Díaz Sánchez',
            'comentario' => $comentario
        ]);

        return $comentarioResponse;
//        return Utils::usuarioInexistenteResponse();
//        return Utils::negocioInexistenteResponse();
    }
}
