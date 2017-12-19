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

    public static function parametrosIncompletosResponse($requiredParams)
    {
        return self::jsonResponse(400, [
            'error_message' => 'Parámetros incompletos, se requieren los ' .
                'siguientes parámetros: [' . implode(', ', $requiredParams) .
                ']'
        ]);
    }

}

