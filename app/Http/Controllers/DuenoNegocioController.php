<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ResponseUtils;
use App\Http\Validators\NegocioExistente;
use App\Http\Validators\UsuarioExistente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;

class DuenoNegocioController extends Controller
{
    public function agregarDueno(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_negocio' => ['required', new NegocioExistente],
            'id_usuario' => ['required', new UsuarioExistente]
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $id_negocio = $request['id_negocio'];
        $id_usuario = $request['id_usuario'];

        // TODO Implementar la lógica de la petición

        $duenoAgregadoResponse = ResponseUtils::jsonResponse(200, [
            'id_asignacion' => 1,
            'id_negocio' => $id_negocio,
            'id_usuario' => $id_usuario,
            'nombre_usuario' => 'Porfirio Ángel Díaz Sánchez',
        ]);

        return $duenoAgregadoResponse;
//        return ResponseUtils::negocioInexistenteResponse();
//        return ResponseUtils::usuarioInexistenteResponse();
    }

    public function removerDueno(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_negocio' => ['required', new NegocioExistente],
            'id_usuario' => ['required', new UsuarioExistente]
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $id_negocio = $request['id_negocio'];
        $id_usuario = $request['id_usuario'];

        // TODO Implementar la lógica de la petición

        $duenoRemovidoReponse = ResponseUtils::jsonResponse(200, [
            'id_asignacion' => 1
        ]);

        return $duenoRemovidoReponse;
//        return ResponseUtils::negocioInexistenteResponse();
//        return ResponseUtils::usuarioInexistenteResponse();
    }

    public function listarDuenos(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_negocio' => ['required', new NegocioExistente]
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $id_negocio = $request['id_negocio'];

        // TODO Implementar la lógica de la petición

        $propietariosResponse = ResponseUtils::jsonResponse(200, [
            [
                'id' => 1,
                'nombre' => 'Porfirio Ángel Díaz Sánchez'
            ],
            [
                'id' => 2,
                'nombre' => 'Porfirio Ángel Díaz Sánchez'
            ]
        ]);

        return $propietariosResponse;
//        return ResponseUtils::jsonResponse(200, []);
//        return ResponseUtils::negocioInexistenteResponse();
    }
}
