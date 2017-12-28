<?php

namespace App\Http\Controllers\PalabraClave;

use App\Http\Controllers\Utils;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PalabraClaveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $palabras_clave = $request['palabras_clave'];

        if (!Utils::isRequiredParametersComplete([$palabras_clave])) {
            return Utils::parametrosIncompletosResponse(['palabras_clave']);
        }

        // TODO Implementar la lógica de la petición

        $recomendacionesReponse = Utils::jsonResponse(200, [
            [
                'id_negocio' => 8,
                'nombre' => 'Macdonnals',
                'logotipo' => '/ZacatecasUp/logos/customer-service.png',
                'calificacion' => 5,
                'descripcion_breve' => 'Un establecimiento muy cool, podrás pasar momentos inolvidales en compañía de toda tu famila',
                'latitud' => 22.7707508,
                'longitud' => -102.6439627
            ],
            [
                'id_negocio' => 9,
                'nombre' => 'La Michoacana',
                'logotipo' => '/ZacatecasUp/logos/money-bag.png',
                'calificacion' => 4.6,
                'descripcion_breve' => 'Un establecimiento muy sucio',
                'latitud' => 22.7673258,
                'longitud' => -102.5876994
            ],
            [
                'id_negocio' => 9,
                'nombre' => 'Starbucks',
                'logotipo' => '/ZacatecasUp/logos/starbucks.png',
                'calificacion' => 2.6,
                'descripcion_breve' => 'Un establecimiento muy sucio',
                'latitud' => 22.7673503,
                'longitud' => -102.5942924
            ],
            [
                'id_negocio' => 9,
                'nombre' => 'KFC',
                'logotipo' => '/ZacatecasUp/logos/kfc.png',
                'calificacion' => 3.6,
                'descripcion_breve' => 'Un establecimiento muy sucio',
                'latitud' => 22.7687222,
                'longitud' => -102.5716986
            ]
        ]);

        $sinRecomendacionesResponse = Utils::jsonResponse(200, []);

        return $recomendacionesReponse;
//        return $sinRecomendacionesResponse;
    }
}
