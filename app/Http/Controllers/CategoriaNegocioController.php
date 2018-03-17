<?php

namespace App\Http\Controllers;

use App\CategoriaNegocio;
use App\Http\Validators\CategoriaNegocioUnica;
use Illuminate\Http\Request;
use Validator;

class CategoriaNegocioController extends Controller
{
    public function registrarCategoria(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoria' => ['required', new CategoriaNegocioUnica]
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $categoria = $request['categoria'];
        $categoriaNegocio = new CategoriaNegocio();
        $categoriaNegocio->categoria = $categoria;
        $categoriaNegocio->save();

        return ResponseUtils::jsonResponse(200, $categoriaNegocio);
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