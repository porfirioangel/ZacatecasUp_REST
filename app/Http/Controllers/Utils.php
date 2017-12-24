<?php

namespace App\Http\Controllers;


class Utils
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
        return Utils::jsonResponse(400, [
            'error' => 'La categoría no existe'
        ]);
    }

    public static function negocioInexistenteResponse() {
        return Utils::jsonResponse(400, [
            'error' => 'El negocio no existe'
        ]);
    }

    public static function usuarioInexistenteResponse() {
        return Utils::jsonResponse(400, [
            'error' => 'El usuario no existe'
        ]);
    }

}

