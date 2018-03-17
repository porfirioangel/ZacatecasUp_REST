<?php

namespace App\Http\Controllers;

use App\CategoriaEvento;
use App\Http\Validators\CategoriaEventoUnica;
use App\Http\Validators\CategoriaEventoExistente;
use Illuminate\Http\Request;
use Validator;

class CategoriaEventoController extends Controller
{
    public function obtenerCategorias()
    {
        $categorias = CategoriaEvento::all();
        $json_array = json_decode($categorias, true);

        $categoriaNames = [];

        foreach ($json_array as $categoria) {
            array_push($categoriaNames, $categoria['categoria']);
        }

        return ResponseUtils::jsonResponse(200, $categoriaNames);
    }

    public function registrarCategoria(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoria' => ['required', new CategoriaEventoUnica]
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $categoria = $request['categoria'];
        $categoriaEvento = new CategoriaEvento();
        $categoriaEvento->categoria = $categoria;
        $categoriaEvento->save();

        return ResponseUtils::jsonResponse(200, $categoriaEvento);
    }

    public function eliminarCategoria(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => ['required', new CategoriaEventoExistente]
        ]);

        if (!$validator->passes()) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => $validator->errors()->all()
            ]);
        }

        $categoriaEvento = CategoriaEvento::find($request['id']);

        try {
            $categoriaEvento->delete();

            return ResponseUtils::jsonResponse(200, $categoriaEvento);
        } catch (\Exception $e) {
            return ResponseUtils::jsonResponse(400, [
                'errors' => [$e->getMessage()]
            ]);
        }
    }
}
