<?php

namespace App\Http\Controllers;


class ResponseUtils
{
    public static function isRequiredParametersComplete($parameters)
    {
        foreach ($parameters as $parameter) {
            if (!$parameter) {
                return false;
            }
        }
        return true;
    }

    public static function jsonResponse($code, $params)
    {
        $jsonResponse = response()->json($params);
        $jsonResponse->setStatusCode($code);
        return $jsonResponse;
    }

    public static function okReponse()
    {
        return self::jsonResponse(200, [
            'ok' => true
        ]);
    }

    public static function parametrosIncompletosResponse($requiredParams)
    {
        return self::jsonResponse(400, [
            'error' => 'Parámetros incompletos, se requieren los ' .
                'siguientes parámetros: [' . implode(', ', $requiredParams) .
                ']'
        ]);
    }

    public static function categoriaInexistenteResponse() {
        return ResponseUtils::jsonResponse(400, [
            'error' => 'La categoría no existe'
        ]);
    }

    public static function negocioInexistenteResponse() {
        return ResponseUtils::jsonResponse(400, [
            'error' => 'El negocio no existe'
        ]);
    }

    public static function usuarioInexistenteResponse() {
        return ResponseUtils::jsonResponse(400, [
            'error' => 'El usuario no existe'
        ]);
    }

}

