<?php

namespace App\Http\Controllers;

use App\CategoriaNegocio;
use Illuminate\Http\Request;
use App\Http\Controllers\Utils;

class CategoriaNegocioController extends Controller
{
    public function registrarCategoria(Request $request)
    {
        $categoria = $request['categoria'];

        if (!Utils::isRequiredParametersComplete([$categoria])) {
            return Utils::parametrosIncompletosResponse(['categoria']);
        }

        // TODO Implementar la lógica de la petición

        $categoriaCreadaResponse = Utils::jsonResponse(200, [
            'categoria' => $categoria
        ]);

        $categoriaExistenteResponse = Utils::jsonResponse(400, [
            'error' => 'La categoría ya existe'
        ]);

        return $categoriaCreadaResponse;
//        return $categoriaExistenteResponse;
    }

    public function eliminarCategoria(Request $request)
    {
        $id = $request['id'];

        if (!Utils::isRequiredParametersComplete([$id])) {
            return Utils::parametrosIncompletosResponse(['id']);
        }

        // TODO Implementar la lógica de la petición

        $categoriaEliminadaResponse = Utils::jsonResponse(200, [
            'id' => $id
        ]);

        return $categoriaEliminadaResponse;
//        return Utils::categoriaInexistenteResponse();
    }

    public function obtenerCategorias()
    {
        $categorias = CategoriaNegocio::all();
        $json_array = json_decode($categorias, true);

        $categoriaNames = [];

        foreach ($json_array as $categoria) {
            array_push($categoriaNames, $categoria['categoria']);
        }

        return Utils::jsonResponse(200, $categoriaNames);
    }
}