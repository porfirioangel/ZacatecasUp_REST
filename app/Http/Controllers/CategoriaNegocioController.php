<?php

namespace App\Http\Controllers;

use App\CategoriaNegocio;
use Illuminate\Http\Request;
use App\Http\Controllers\ResponseUtils;
use Validator;

class CategoriaNegocioController extends Controller
{
    public function registrarCategoria(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoria' => ['required']
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $categoria = $request['categoria'];

        // TODO Implementar la lógica de la petición

        $categoriaCreadaResponse = ResponseUtils::jsonResponse(200, [
            'categoria' => $categoria
        ]);

        $categoriaExistenteResponse = ResponseUtils::jsonResponse(400, [
            'error' => 'La categoría ya existe'
        ]);

        return $categoriaCreadaResponse;
//        return $categoriaExistenteResponse;
    }

    public function eliminarCategoria(Request $request)
    {
        $id = $request['id'];

        if (!ResponseUtils::isRequiredParametersComplete([$id])) {
            return ResponseUtils::parametrosIncompletosResponse(['id']);
        }

        // TODO Implementar la lógica de la petición

        $categoriaEliminadaResponse = ResponseUtils::jsonResponse(200, [
            'id' => $id
        ]);

        return $categoriaEliminadaResponse;
//        return ResponseUtils::categoriaInexistenteResponse();
    }

    public function obtenerCategorias()
    {
        $categorias = CategoriaNegocio::all();
        $json_array = json_decode($categorias, true);

        $categoriaNames = [];

        foreach ($json_array as $categoria) {
            array_push($categoriaNames, $categoria['categoria']);
        }

        return ResponseUtils::jsonResponse(200, $categoriaNames);
    }
}